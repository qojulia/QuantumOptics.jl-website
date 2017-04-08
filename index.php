<?php include('header.html'); ?>

    <!-- Header -->
    <header class="jumbotron">
	    <div class="container text-center">
	   	 <h1>QuantumOptics.jl</h1>
	   	 <h2>A Julia Framework for Open Quantum Dynamics</h2>
	    </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to QuantumOptics.jl
                </h1>
            </div>
            <div class="col-md-8">
	                <h3 class="page-header"><i class="fa fa-fw fa-cubes"></i> About the Framework</h3>
                <p>QuantumOptics.jl is a numerical framework written in Julia that makes it easy to simulate various kinds of quantum systems. It is similar to the <a>Quantum Optics Toolbox for MATLAB</a> and its Python equivalent <a>QuTiP</a>.</p>
                <p>QuantumOptics.jl is developed in the <a>group of Prof. Helmut Ritsch</a> at the Institute for Theoretical Physics of the University of Innsbruck, Austria. Development is lead by <a>Sebastian Krämer</a>.</p>
            </div>
            <div class="col-md-4">
		            <h3 class="page-header"><i class="fa fa-fw fa-code"></i> Getting started</h3>
	            <p>The easiest way to get started is to install Julia and add the QuantumOptics package from within it.</p>
	            <p>Go to <a>Julia's website</a>, download the package for your platform and look at the sample code below.</p>
            </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
	        <div class="col-lg-12">
		        <h2 class="page-header"><i class="fa fa-file-code-o"></i> Code Example</h2>
	        </div>
	        <div class="col-md-12">
		        <pre>Pkg.add("QuantumOptics") # Add the package to your Julia installation

using QuantumOptics

b = SpinBasis(1//2)
H = sigmap(b) + sigmam(b)
psi0 = spindown(b)

T = [0:0.1:1;]
tout, psit = timeevolution.schroedinger(T, psi0, H)</pre>
	        </div>
        </div>


        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><i class="fa fa-list"></i> QuantumOptics.jl Features</h2>
            </div>
            <div class="col-md-6">
                <p>A few of the most outstanding features of QuantumOptics.jl include</p>
                <ul>
                    <li>Modern and robust design</li>
                    <li>Easy to read / easy to use</li>
                    <li>Less than two minutes to set up</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->
    </div>

 <?php include('footer.html'); ?>
