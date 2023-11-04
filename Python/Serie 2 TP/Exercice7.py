def nbrCatalan(epsilon):
    i = 1
    k = 0
    k1 = 0.5
    k2 = 0.5
    if epsilon == 1:
        return 1
    else:
        while k1+k2 > epsilon:
            k1 = ((-1)**i)/((2*i+1)**2)
            k2 = ((-1) ** (i-1)) / ((2 * (i-1) + 1) ** 2)
            k += k1+k2
            i += 2
    return k

print(nbrCatalan(0.00004))