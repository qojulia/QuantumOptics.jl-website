kap = 1.
eta = 4*kap
delta = 0
tmax = 100
tsteps = 201
tlist = np.linspace(0, tmax, tsteps)

a = qt.destroy(Ncutoff)
ad = a.dag()
H = delta*ad*a + eta*(a + ad)
c_ops = [np.sqrt(2*kap)*a]

psi0 = qt.basis(Ncutoff, 0)
n = qt.mesolve(H, psi0, tlist, c_ops, [ad*a], options=options).expect[0]
return n