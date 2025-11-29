
if normpath(Base.active_project()) != normpath(joinpath(@__DIR__, "Project.toml"))
    #If the current directory isn't the active Julia project, make it so
    import Pkg
    Pkg.activate(@__DIR__)
end

# Build Code Snippets
include("src/_codesnippets/make.jl")