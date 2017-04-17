# System parameters
ω = 1.89 # Frequency of driving laser
ωc = 2.13 # Cavity frequency
η = 0.76 # Pump strength
κ = 0.34 # Decay rate
δc = ωc - ω # Detuning

# Benchmark
b = FockBasis(Ncutoff-1)

a = destroy(b)
at = create(b)
n = number(b)

Γ = Matrix{Float64}(1,1)
Γ[1,1] = κ
J = [a]
Jdagger = [at]

α0 = 0.3 - 0.5im
psi0 = coherentstate(b, α0)

T = [0:1.:10;]
αt = Float64[]
fout(t, rho) = push!(αt, real(expect(a, rho)))
H(t, n, a, at) = ωc*n + η*(a*exp(1im*ω*t) + at*exp(-1im*ω*t))
HJ(t::Float64, rho::DenseOperator) = (H(t, n, a, at), J, Jdagger)
timeevolution.master_dynamic(T, psi0, HJ; Gamma=Γ, fout=fout, reltol=1e-6, abstol=1e-8)
