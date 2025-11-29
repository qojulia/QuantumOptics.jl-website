# QuantumOptics.jl website

* **QuantumOptics.jl-benchmarks** generates JSON files containing the results of the benchmarks and provides the source code of the examples. For now, the folder *benchmark-data* is managed by Git, although it can be generated from the *benchmarks* repo if needed. This is a convenience method.

In this repository the following additional resources are defined:
* A common header used in every single page.
* A common navigation menu (on the top of each page).
* A common footer.
* The main page.
* **QuantumOptics.jl** code snippets which are shown in the main page.
* Citation page.
* Benchmark page presenting the data and source-code obtained from **QuantumOptics.jl-benchmarks**.

[Jekyll](https://jekyllrb.com) is used to generate the (static) website from all different parts.

The website itself uses the following technologies:

**JavaScript libraries**
* **jquery.js**
* **Require.js**
* **Bootstrap.js** for the layout.
* **MathJax.js** for representing LaTeX formulas.
* **highlight.js** to dynamically highlight the source code.
* **Chart.js** for the interactive benchmark plots.

**CSS**
* **Bootstrap.css**
* **font-awesome**
* **Lato|Ubuntu+Mono**


A basic principle is that any code that is shown should be run and tested automatically before it is included.


## Directory layout

It is recommended to place all resources into the same directory, i.e.:

    |
    |--> ./QuantumOptics.jl
    |--> ./QuantumOptics.jl-examples
    |--> ./QuantumOptics.jl-documentation
    |--> ./QuantumOptics.jl-benchmarks
    |--> ./QuantumOptics.jl-website


## Software Requirements

* [Jekyll](https://jekyllrb.com)
* [Documenter.jl](https://juliadocs.github.io/Documenter.jl) (Can be installed with `julia> Pkg.add("Documenter")`)


## Build process

The code snippets are executed by make.jl.

Finally, one uses jekyll to build the website:

* For development, run jekyll interactively: `jekyll serve`.
* To just create it once: `jekyll build`. This will create the finished website in the `build` directory which then can be deployed to the server.
