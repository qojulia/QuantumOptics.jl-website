using QuantumOptics
b_x = PositionBasis(-10, 10, 300)
b_p = MomentumBasis(b_x)
Tpx = transform(b_p, b_x)
Txp = transform(b_x, b_p)
x = position(b_x)
p = momentum(b_p)

Hkin = LazyProduct(Txp, p^2/4, Tpx)
V = 0.2*x^2
Hpsi = diagonaloperator(b_x, Ket(b_x).data)
H = LazySum(Hkin, V, Hpsi)

function fout(t, ψ)
    Hpsi.data.nzval .= -abs2.(ψ.data)
    H
end
ψ₀ = gaussianstate(b_x, 0, 0, 0.7)
tout, ψₜ = timeevolution.schroedinger_dynamic([0:0.1:20;], ψ₀, fout)

using PyPlot
plot(samplepoints(b_x), abs2(ψₜ[1].data))
plot(samplepoints(b_x), abs2(ψₜ[end].data))
xlabel("x")
ylabel("Density")
savefig("gross_pitaevskii.svg")
