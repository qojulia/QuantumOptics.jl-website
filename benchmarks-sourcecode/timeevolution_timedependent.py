# System parameters
omega = 1.89  # Frequency of driving laser
omega_c = 2.13  # Cavity frequency
eta = 0.76  # Pump strength
kappa = 0.34  # Decay rate


# Benchmark
a = qt.destroy(Ncutoff)
at = qt.create(Ncutoff)
n = qt.num(Ncutoff)

J = [np.sqrt(kappa)*a]

alpha0 = 0.3 - 0.5j
psi0 = qt.coherent(Ncutoff, alpha0)

tlist = np.linspace(0, 10., 11)
H = [omega_c*n,
        [eta*a, lambda t, args: np.exp(1j*omega*t)],
        [eta*at, lambda t, args: np.exp(-1j*omega*t)]]
alpha_t = np.real(qt.mesolve(H, psi0, tlist, J, [a], options=options).expect[0])
