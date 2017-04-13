<?php include('header.html'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Benchmarks
                </h1>
                <p>
                    Benchmark tests are conducted with the following set of test programs found on the <a href="https://github.com/bastikr/QuantumOpticsFrameworks-Benchmarks">Quantum Optics Frameworks Benchmark Repo</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="tab">
                <button class="tablinks" onclick="openBenchmarkSet(event, 'timeevolution')" id="defaultOpen">
                    Time-evolution
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
            <div class="tabcontent", id="timeevolution">
                <div class="col-md-6">
                	<canvas id="plot-timeevolution-master"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-timeevolution-particle"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-timeevolution-timedependent"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="expectationvalues">
                <div class="col-md-6">
                	<canvas id="plot-expect-state"></canvas>
                </div>
    	        <div class="col-md-6">
                	<canvas id="plot-expect-operator"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-variance-state"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-variance-operator"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-ptrace"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="qfunc">
                 <div class="col-md-6">
                	<canvas id="plot-coherentstate"></canvas>
                </div>
                 <div class="col-md-6">
                	<canvas id="plot-qfunc-state"></canvas>
                </div>
    	        <div class="col-md-6">
                	<canvas id="plot-qfunc-operator"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="tabcontent", id="multiplication">
                <div class="col-md-6">
                    <canvas id="plot-multiplication-sparse-sparse"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-multiplication-sparse-dense"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-multiplication-dense-sparse"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="plot-multiplication-dense-dense"></canvas>
                </div>
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
<script src="js/chart.bundle.min.js"></script>
