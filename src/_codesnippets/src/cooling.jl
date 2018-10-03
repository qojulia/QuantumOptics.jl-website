using QuantumOptics
bc = FockBasis(16)
ba = SpinBasis(1//2)
a = destroy(bc) ⊗ one(ba)
sm = one(bc) ⊗ sigmam(ba)
H0 = 0.5*dagger(sm)*sm + a + dagger(a)
Hx = 0.5*(dagger(a)*sm + a*dagger(sm))
J = [a, sqrt(2)*sm]
Jdagger = map(dagger, J)

function fquantum(t, ψ, u)
  H0 + Hx*cos(real(u[1])), J, Jdagger
end
function fclassical(t, ψ, u, du)
  du[1] = 0.3*real(u[2])
  du[2] = sin(real(u[1]))*real(expect(dagger(a)*sm, ψ))
end
ψ0 = semiclassical.State(fockstate(bc, 0) ⊗ spindown(ba), ComplexF64[sqrt(2), 6.0])
tout, ρt = semiclassical.master_dynamic([0:0.1:200;], ψ0, fquantum, fclassical)
p = [real(r.classical[2]) for r=ρt]

using PyPlot
plot(tout, p.^2)
ylabel("Kinetic energy")
xlabel("Time")
savefig("cooling.svg")
