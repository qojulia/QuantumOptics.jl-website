# QuantumOptics.jl website

The whole **QuantumOptics.jl** website is created from different parts:
* **QuantumOptics.jl-examples** provides all the examples that are used and linked to in the documentation. They are created using jupyter notebooks and executed and converted to markdown with nbconvert. This markdown code is then copied to **QuantumOptics.jl-documentation**.
* **QuantumOptics.jl-documentation** is written with markdown. **Documenter.jl** is used to integrate the docstrings from **QuantumOptics.jl** and to generate html code which includes the examples from **QuantumOptics.jl-examples**.
* **QuantumOptics.jl-benchmarks** generates json files containing the results of the benchmarks and provides the source code of the examples.

In this repository the following additional resources are defined:
* A common header used in every single page.
* A common navigation menu (on the top of each page).
* A common footer.
* The main page.
* **QuantumOptics.jl** code snippets which are shown in the main page.
* Citation page.
* Benchmark page presenting the data and source-code obtained from **QuantumOptics.jl-benchmarks**

[Jekyll](https://jekyllrb.com) is used to generate the (static) website from all different parts.

The website itself uses the following technologies:

JavaScript libraries:
* **jquery.js**
* **Requite.js**
* **Bootstrap.js** for the layout.
* **MathJax.js** for representing latex formulas.
* **highlight.js** to dynamically highlight the source code.
* **Chart.js** for the interactive benchmark plots.

CSS:
* **Bootstrap.css**
* **font-awesome**
* **Lato|Ubuntu+Mono**


A basic principle is that any code that is shown should be run and tested automatically before it is included.


## Build process

* Build documentation in `QuantumOptics.jl-documentation`. Output will automatically be copied into `/src/documentation`.
* Run benchmarks and copy results into `src/benchmark-data`. Code of the benchmarks has to be manually copied to _benchmarks-sourcecode. This process is not automated yet but definitely should be in the future.
* Create code snippets (which then are shown in the main page) with `make.jl` in src/_codesnippets.
* Use jekyll to build website:
    * For development run jekyll interactively: `jekyll serve`
    * To just create it once: `jekyll build`
  This will create the finished website in the `build` directory which then can be deployed to the server.
