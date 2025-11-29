using QuantumOptics

let basis = PositionBasis(-2, 2, 200)
    x = position(basis)
    p = momentum(basis)
    H = p^2 / 4 + 2 * DenseOperator(x^2)
    energies, states = eigenstates((H + dagger(H)) / 2, 5)

    using PyPlot
    xpoints = samplepoints(basis)
    plot(xpoints, 2 * xpoints .^ 2)
    fill_between(xpoints, 0.0, 2 * xpoints .^ 2, alpha=0.5)
    for i in eachindex(states)
        plot(xpoints, abs2.(states[i].data) .* 40 .+ energies[i])
    end
    xlabel("Position")
    ylabel("Energy")
    tight_layout()
    savefig("particle.svg")
end