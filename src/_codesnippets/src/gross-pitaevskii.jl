using QuantumOptics

let b_x = PositionBasis(-10, 10, 300), b_p = MomentumBasis(b_x)
    Tpx = transform(b_p, b_x)
    Txp = transform(b_x, b_p)
    x = position(b_x)
    p = momentum(b_p)

    Hkin = LazyProduct(Txp, p^2 / 2, Tpx)
    Hpsi = diagonaloperator(b_x, Ket(b_x).data)
    H = LazySum(Hkin, Hpsi)

    fquantum(t, ψ) = (Hpsi.data.nzval .= -50 .* abs2.(ψ.data); H)
    ψ₀ = gaussianstate(b_x, -2π, 2, 1.5) + gaussianstate(b_x, 2π, -2, 1.5)
    normalize!(ψ₀)
    tout, ψₜ = timeevolution.schroedinger_dynamic([0:0.01:6;], ψ₀, fquantum)
    density = [abs2(ψ.data[j]) for ψ = ψₜ, j = 1:length(b_x)]

    using PyPlot
    contourf(samplepoints(b_x), tout, density, 50)
    xlabel("x")
    ylabel("Time")
    savefig("gross_pitaevskii.png")
end