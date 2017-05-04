sourcedir = "src"
builddir = "build"
imagedir = "../../images/codesnippets"

cp(sourcedir, builddir; remove_destination=true)
cd(builddir)

names = filter(name->endswith(name, ".jl"), readdir("."))
for name in names
    println("Executing $name")
    run(`julia $name`)
end

imagenames = filter(name->endswith(name, ".svg")||endswith(name, ".png"), readdir("."))
for name in imagenames
    println("Copying $name")
    cp(name, joinpath(imagedir, name); remove_destination=true)
end
