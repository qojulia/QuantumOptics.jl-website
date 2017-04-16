```julia
using QuantumOptics
using PyPlot

basis = FockBasis(50)
a = destroy(basis)
at = create(basis)
H = at*a + 0.5*(a + at)
J = [0.9*a]
ψ0 = coherentstate(basis, 2 + 1im)
T = [0:0.01:10;]
tout, ρt = timeevolution.master(T, ψ0, H, J)
α = expect(a, ρt)

plot(real(α), imag(α))
plot(real(α[1:50:end]), imag(α[1:50:end]), "oC0")
tight_layout()
savefig("fock.svg")
```