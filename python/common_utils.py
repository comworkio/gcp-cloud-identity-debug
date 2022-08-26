def is_not_empty (var):
    if (isinstance(var, bool)):
        return var
    elif (isinstance(var, int)):
        return True
    empty_chars = ["", "null", "nil", "false", "none"]
    return var is not None and not any(c == "{}".format(var).lower() for c in empty_chars)

def is_false (var) :
    false_char = ["false", "ko", "no", "disabled"]
    return is_empty(var) or any(c == "{}".format(var).lower() for c in false_char)

def is_true (var):
    return not is_false(var)

def is_empty (var):
    return not is_not_empty(var)
