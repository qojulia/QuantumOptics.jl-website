<?php include('header.html'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Benchmarks
                </h1>
                
                <p>Benchmark tests are conducted with the following set of test programs found on the <a href="https://github.com/bastikr/QuantumOpticsFrameworks-Benchmarks">Quantum Optics Frameworks Benchmark Repo</a></p>.
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-8 col-md-offset-2">
            	<canvas id="plot-time-evolution"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            	<canvas id="plot-expect-state"></canvas>
            </div>
	        <div class="col-md-6">
            	<canvas id="plot-expect-operator"></canvas>
            </div>
             <div class="col-md-6">
            	<canvas id="plot-coherentstate"></canvas>
            </div>
	        <div class="col-md-6">
            	<canvas id="plot-ptrace"></canvas>
            </div>
             <div class="col-md-6">
            	<canvas id="plot-qfunc-state"></canvas>
            </div>
	        <div class="col-md-6">
            	<canvas id="plot-qfunc-operator"></canvas>
            </div>
             <div class="col-md-6">
            	<canvas id="plot-variance-state"></canvas>
            </div>
	        <div class="col-md-6">
            	<canvas id="plot-variance-operator"></canvas>
            </div>
        </div>
    </div>
           
 <?php include('footer.html'); ?>
