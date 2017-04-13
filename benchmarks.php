<?php include('header.html'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Benchmarks
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="tab">
                <button class="tablinks" onclick="openBenchmarkSet(event, 'timeevolution1')" id="defaultOpen">
                    Time-evolution 1
                </button>
                <button class="tablinks" onclick="openBenchmarkSet(event, 'timeevolution2')">
                    Time-evolution 2
                </button>
                <button class="tablinks" onclick="openBenchmarkSet(event, 'timeevolution3')">
                    Time-evolution 3
                </button>
                <button class="tablinks" onclick="openBenchmarkSet(event, 'expectationvalues')">
                    Expectation values
                </button>
                <button class="tablinks" onclick="openBenchmarkSet(event, 'qfunc')">
                    Q-Function
                </button>
                <button class="tablinks" onclick="openBenchmarkSet(event, 'multiplication')">
                    Multiplication
                </button>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="timeevolution1">
                <div class="tabcontentheader">
                    <h2>Pumped cavity-mode with photon loss (Master equation)</h2>
                </div>
                <div class="tabcontentbody">
                    A cavity mode, modeled as a fock space with a certain cutoff, is driven on resonance with a classical laser. Since photon loss is included, the system is an open system and evolves according to a master equation

                    <!-- \dot{\rho} = -\frac{i}{\hbar} \big[H,\rho\big] +  \kappa\big(a\rho a^\dagger - \frac{1}{2} a^\dagger a \rho - \frac{1}{2} \rho a^\dagger a \big) -->
                    <math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><mrow class="MJX-TeXAtom-ORD">  <mover>    <mi>&#x03C1;<!-- ρ --></mi>    <mo>&#x02D9;<!-- ˙ --></mo>  </mover></mrow><mo>=</mo><mo>&#x2212;<!-- − --></mo><mfrac>  <mi>i</mi>  <mi class="MJX-variant">&#x210F;<!-- ℏ --></mi></mfrac><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">[</mo></mrow><mi>H</mi><mo>,</mo><mi>&#x03C1;<!-- ρ --></mi><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">]</mo></mrow><mo>+</mo><mi>&#x03BA;<!-- κ --></mi><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">(</mo></mrow><mi>a</mi><mi>&#x03C1;<!-- ρ --></mi><msup>  <mi>a</mi>  <mo>&#x2020;<!-- † --></mo></msup><mo>&#x2212;<!-- − --></mo><mfrac>  <mn>1</mn>  <mn>2</mn></mfrac><msup>  <mi>a</mi>  <mo>&#x2020;<!-- † --></mo></msup><mi>a</mi><mi>&#x03C1;<!-- ρ --></mi><mo>&#x2212;<!-- − --></mo><mfrac>  <mn>1</mn>  <mn>2</mn></mfrac><mi>&#x03C1;<!-- ρ --></mi><msup>  <mi>a</mi>  <mo>&#x2020;<!-- † --></mo></msup><mi>a</mi><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">)</mo></mrow></math>

                    with Hamiltonian

                    <!-- H = \eta (a + a^\dagger). -->
                    <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">  <mi>H</mi>  <mo>=</mo>  <mi>&#x03B7;<!-- η --></mi>  <mo stretchy="false">(</mo>  <mi>a</mi>  <mo>+</mo>  <msup>    <mi>a</mi>    <mo>&#x2020;<!-- † --></mo>  </msup>  <mo stretchy="false">)</mo><mo>.</mo></math>

                    This benchmark measures the time it takes to create all necessary operators and states, perform a time-evolution according to a master equation and calculate the expectation value of the number operator at certain times.
                    <!-- <div class="col-md-10"> -->
                        <h3>Benchmark results</h3>
                    	<canvas id="plot-timeevolution-master"></canvas>
                    <!-- </div> -->
                    <!-- <div class="col-md-8"> -->
                        <h3>Source-code</h3>
                        <button class="accordion">QuantumOptics.jl</button>
                        <div class="panel">
                            <?php include('benchmarks-sourcecode/timeevolution_master_jl.html'); ?>
                        </div>
                        <button class="accordion">QuTiP</button>
                        <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_master_py.html'); ?>
                        </div>
                        <button class="accordion">Matlab Quantum Optics Toolbox</button>
                        <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_master_m.html'); ?>
                        </div>
                </div>
                    <!-- </div> -->
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="timeevolution2">
                <div class="tabcontentheader">
                    <h2>Pumped cavity-mode with photon loss (Time-dependent Master equation)</h2>
                </div>
                <div class="tabcontentbody">
                    Revisiting the first example, the system is now simulated without using the rotating frame of the driving laser. The pumping term then becomes time dependent and the Hamiltonian is

                    <!-- H(t) = \omega_c a^\dagger a + \eta \big(a e^{i\omega t} + a^\dagger e^{-i \omega t}\big). -->
                    <math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><mi>H</mi><mo stretchy="false">(</mo><mi>t</mi><mo stretchy="false">)</mo><mo>=</mo><msub>  <mi>&#x03C9;<!-- ω --></mi>  <mi>c</mi></msub><msup>  <mi>a</mi>  <mo>&#x2020;<!-- † --></mo></msup><mi>a</mi><mo>+</mo><mi>&#x03B7;<!-- η --></mi><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">(</mo></mrow><mi>a</mi><msup>  <mi>e</mi>  <mrow class="MJX-TeXAtom-ORD">    <mi>i</mi>    <mi>&#x03C9;<!-- ω --></mi>    <mi>t</mi>  </mrow></msup><mo>+</mo><msup>  <mi>a</mi>  <mo>&#x2020;<!-- † --></mo></msup><msup>  <mi>e</mi>  <mrow class="MJX-TeXAtom-ORD">    <mo>&#x2212;<!-- − --></mo>    <mi>i</mi>    <mi>&#x03C9;<!-- ω --></mi>    <mi>t</mi>  </mrow></msup><mrow class="MJX-TeXAtom-ORD">  <mo maxsize="1.2em" minsize="1.2em">)</mo></mrow><mo>.</mo></math>

                    <h3>Benchmark results</h3>
                    <canvas id="plot-timeevolution-timedependent"></canvas>

                    <h3>Source-code</h3>
                    <button class="accordion">QuantumOptics.jl</button>
                    <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_timedependent_jl.html'); ?>
                    </div>
                    <button class="accordion">QuTiP</button>
                    <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_timedependent_py.html'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="timeevolution3">
                <div class="tabcontentheader">
                    <h2>Particle in harmonic trap (Schrödinger equation)</h2>
                </div>
                <div class="tabcontentbody">
                    A discretized position space is used to simulate the movement of an, initially gaussian, wave-packet in an harmonic trap potential according to the Schrödinger equation

                    <!-- i\hbar\frac{\mathrm{d}}{\mathrm{d} t} |\Psi(t)\rangle = H |\Psi(t)\rangle -->
                    <math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><mi>i</mi><mi class="MJX-variant">&#x210F;<!-- ℏ --></mi><mfrac>  <mrow class="MJX-TeXAtom-ORD">    <mi mathvariant="normal">d</mi>  </mrow>  <mrow>    <mrow class="MJX-TeXAtom-ORD">      <mi mathvariant="normal">d</mi>    </mrow>    <mi>t</mi>  </mrow></mfrac><mrow class="MJX-TeXAtom-ORD">  <mo stretchy="false">|</mo></mrow><mi mathvariant="normal">&#x03A8;<!-- Ψ --></mi><mo stretchy="false">(</mo><mi>t</mi><mo stretchy="false">)</mo><mo fence="false" stretchy="false">&#x27E9;<!-- ⟩ --></mo><mo>=</mo><mi>H</mi><mrow class="MJX-TeXAtom-ORD">  <mo stretchy="false">|</mo></mrow><mi mathvariant="normal">&#x03A8;<!-- Ψ --></mi><mo stretchy="false">(</mo><mi>t</mi><mo stretchy="false">)</mo><mo fence="false" stretchy="false">&#x27E9;<!-- ⟩ --></mo></math>

                    with Hamiltonian

                    <!-- H = p^2 + 2*x^2. -->
                    <math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><mi>H</mi><mo>=</mo><msup>  <mi>p</mi>  <mn>2</mn></msup><mo>+</mo><mn>2</mn><mo>&#x2217;<!-- ∗ --></mo><msup>  <mi>x</mi>  <mn>2</mn></msup> <mo>.</mo></math>

                    This benchmark measures only the time it takes to perform the time-evolution and calculating the expectation values. Creating all necessary operators and states is done separately.

                    <h3>Benchmark results</h3>
                    <canvas id="plot-timeevolution-particle"></canvas>

                    <h3>Source-code</h3>
                    <button class="accordion">QuantumOptics.jl</button>
                    <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_particle_jl.html'); ?>
                    </div>
                    <button class="accordion">QuTiP</button>
                    <div class="panel">
                        <?php include('benchmarks-sourcecode/timeevolution_particle_py.html'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="expectationvalues">
                <div class="tabcontentbody">
                    <div class="container">
                        <div class="row">
                            <h3>Expectation values</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            	<canvas id="plot-expect-state"></canvas>
                            </div>
                	        <div class="col-md-6">
                            	<canvas id="plot-expect-operator"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Variances</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="plot-variance-state"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="plot-variance-operator"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Partial trace</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="plot-ptrace"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="qfunc">
                <div class="tabcontentbody">
                    <div class="container">
                        <div class="row">
                            <h3>Coherent states</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            	<canvas id="plot-coherentstate"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Q-function</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            	<canvas id="plot-qfunc-state"></canvas>
                            </div>
                            <div class="col-md-6">
                            	<canvas id="plot-qfunc-operator"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="multiplication">
                <div class="tabcontentbody">
                    <div class="container">
                        <div class="row">
                            <h3>Matrix-Matrix multiplication</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="plot-multiplication-sparse-sparse"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="plot-multiplication-sparse-dense"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="plot-multiplication-dense-sparse"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="plot-multiplication-dense-dense"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   About Benchmarking
                </h1>
                <p>
                    Benchmarking is a tricky thing to do right. Many different variables can significantly influence the results. The choice of example and the presentation of the results may be biased towards one or the other framework. We tried our best to be as fair as possible but probably made mistakes along the way. To give everybody the chance to reproduce our results, the whole code is open source and can be found at github in the <a href="https://github.com/bastikr/QuantumOpticsFrameworks-Benchmarks">QuantumOpticsFrameworks-Benchmarks</a> repository. If you find any mistakes or obtain different results we would be grateful if you could file an issue there.
                </p>
                <p>
                    A few remarks to the benchmarking process:
                    <ul>
                        <li>
                            All benchmarks are performed on a <strong>single dedicated CPU core</strong>. Both cases, single-processing and multi-processing, are of interest with slightly different implications. Obviously, when working interactively on a single example, the complete available processing power should be used to get the answer as fast as possible. However, for embarrassingly parallel problems, like for example performing the same time-evolution for different parameters, it is favorable to avoid any unnecessary overhead stemming from premature parallelization.
                        </li>
                        <li>
                            <strong>Startup time is neglected</strong>. Julia's just-in-time compilation, which is the key to generate extremely performant code, comes with a price. The first time a function is called with a certain set of argument types it has to be compiled which leads to a constant offset in every single benchmark. If the function is called often enough and/or runs long enough this overhead doesn't matter. However, if a function is called only once the overhead might be considerable and is the reason why often times using Julia feels less "snappy" compared to other languages.
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>

 <?php include('footer.html'); ?>

<script src="js/chart.bundle.min.js"></script>
<script src="js/qojl.js"></script>
<script>
    // Open default tab
    document.getElementById("defaultOpen").click();
</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-MML-AM_CHTML'></script>