def execInEnv(envname="env", globals=None, locals=None):
    """ run the current program in a virtualenv """
    logging.info('running in virtualenv: '+envname)
    if globals is None:
        globals = {}
    filepath = envname + "/Scripts/activate_this.py"
    globals.update({
        "__file__": filepath,
        "__name__": "__main__",
    })
    with open(filepath, 'rb') as file:
        exec(compile(file.read(), filepath, 'exec'), globals, locals)


execInEnv(main)

import numpy
print("ggg")
