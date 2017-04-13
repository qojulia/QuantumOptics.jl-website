xmin = -10
xmax = 10

x0 = 2
p0 = 1
sigma0 = 1


# Setup
dx = (xmax - xmin)/Npoints
pmin = -np.pi/dx
pmax = np.pi/dx
dp = (pmax - pmin)/Npoints

samplepoints_x = np.linspace(xmin, xmax, Npoints, endpoint=False)
samplepoints_p = np.linspace(pmin, pmax, Npoints, endpoint=False)

x = qt.Qobj(np.diag(samplepoints_x))
row0 = [sum([p*np.exp(-1j*p*dxji) for p in samplepoints_p])*dp*dx/(2*np.pi) for dxji in samplepoints_x - xmin]
row0 = np.array(row0)
col0 = row0.conj()

a = np.zeros([Npoints, Npoints], dtype=complex)
for i in range(Npoints):
    a[i, i:] = row0[:Npoints-i]
    a[i:, i] = col0[:Npoints-i]
p = qt.Qobj(a)

H = p**2 + 2*x**2

def gaussianstate(x0, p0, sigma):
    alpha = 1./(np.pi**(1/4)*np.sqrt(sigma))*np.sqrt(dx)
    data = alpha*np.exp(1j*p0*(samplepoints_x-x0) - (samplepoints_x-x0)**2/(2*sigma**2))
    return qt.Qobj(data)

psi0 = gaussianstate(2., 1., 1.)


# Benchmark
tlist = np.linspace(0, 10, 11)
exp_x = qt.mesolve(H, psi0, tlist, [], [x], options=options).expect[0]
