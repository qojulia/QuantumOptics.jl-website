using QuantumOptics

let bc = FockBasis(16), ba = SpinBasis(1 // 2)
  a = destroy(bc) ⊗ one(ba)
  sm = one(bc) ⊗ sigmam(ba)
  H0 = 0.5 * sm' * sm + a + a'
  Hx = 0.5 * (a' * sm + a * sm')
  J = [a, sqrt(2) * sm]
  Jdagger = dagger.(J)

  fquantum(t, ψ, u) = H0 + Hx * cos(u[1]), J, Jdagger
  function fclassical(du, u, ψ, t)
    du[1] = 0.3 * real(u[2])
    du[2] = sin(real(u[1])) * real(expect(dagger(a) * sm, ψ))
  end
  u0 = ComplexF64[sqrt(2), 6.0]
  ψ0 = semiclassical.State(fockstate(bc, 0) ⊗ spindown(ba), u0)
  tout, p = semiclassical.master_dynamic([0:1.0:200;], ψ0, fquantum,
    fclassical; fout=(t, rho) -> rho.classical[2])

  using PyPlot
  plot(tout, p .^ 2)
  ylabel("Kinetic energy")
  xlabel("Time")
  savefig("cooling.svg")
end