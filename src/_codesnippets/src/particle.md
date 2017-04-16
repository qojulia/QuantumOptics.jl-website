```@example
using QuantumOptics
using PyPlot

basis = PositionBasis(-10, 10, 200)
x = position(basis)
p = momentum(basis)
H = p^2/2 + 0.5*full(x^2)
ψ0 = gaussianstate(basis, 5, 0, 1)
T = [0:0.1:4pi;]
tout, ψt = timeevolution.schroedinger(T, ψ0, H)

plot(tout, expect(x, ψt), label="Position")
plot(tout, expect(p, ψt), label="Momentum")
tight_layout()
savefig("particle.svg")
```