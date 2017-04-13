xmin = -10
xmax = 10

x0 = 2
p0 = 1
sigma0 = 1


# Setup
bx = PositionBasis(xmin, xmax, Npoints)
x = position(bx)
p = momentum(bx)
H = p^2 + full(2*x^2)
psi0 = gaussianstate(bx, x0, p0, sigma0)


# Benchmark
T = [0:1.:10;]
exp_x = Float64[]
fout(t, psi) = push!(exp_x, real(expect(x, psi)))
timeevolution.schroedinger(T, psi0, H; fout=fout, reltol=1e-6, abstol=1e-8)
