sourcedir = "src"
builddir = "build"
imagedir = "../../images/codesnippets"

cd(@__DIR__)
cp(sourcedir, builddir; force=true)
cd(builddir)

names = filter(endswith(".jl"), readdir("."))
for name in names
    println("Executing $name")
    include(joinpath(builddir, "$name"))
    PyPlot.clf()
end

imagenames = filter(name->endswith(name, ".svg")||endswith(name, ".png"), readdir("."))
mkpath(imagedir)
for name in imagenames
    println("Copying $name")
    cp(name, joinpath(imagedir, name); force=true)
end
