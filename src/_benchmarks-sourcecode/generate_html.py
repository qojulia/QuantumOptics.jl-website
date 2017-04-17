import os
import subprocess

sourcedir = "."
builddir = "."

names = os.listdir(sourcedir)
names = filter(lambda x: not x == os.path.basename(__file__) and not x.endswith(".html"), names)
# names = filter(lambda x: "raman" in x, names)

for name in names:
    print("Converting", name)
    barename, extension = os.path.splitext(name)
    sourcepath = os.path.join(sourcedir, name)
    targetpath = os.path.join(builddir, barename + "_" + extension[1:] + ".html")
    subprocess.run(["pygmentize",
                        "-o", targetpath,
                        sourcepath])

f = open("../css/sourcecode.css", "w")
subprocess.run(["pygmentize", "-f", "html", "-a", ".highlight", "-S", "default"], stdout=f)
