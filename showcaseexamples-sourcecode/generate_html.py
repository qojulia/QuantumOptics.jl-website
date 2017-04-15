import os
import subprocess

sourcedir = "."
builddir = "."

names = os.listdir(sourcedir)
names = filter(lambda x: x.endswith("jl"), names)

for name in names:
    print("Converting", name)
    barename, extension = os.path.splitext(name)
    sourcepath = os.path.join(sourcedir, name)
    targetpath = os.path.join(builddir, barename + ".html")
    subprocess.run(["pygmentize",
                        "-o", targetpath,
                        sourcepath])

f = open("../css/sourcecode.css", "w")
subprocess.run(["pygmentize", "-f", "html", "-a", ".highlight", "-S", "default"], stdout=f)
