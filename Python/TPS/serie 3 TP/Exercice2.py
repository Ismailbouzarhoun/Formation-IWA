def compare(L,M):
    if len(L)!=len(M):
        return False
    for i in range(len(L)):
        if L[i]!=M[i]:
            return False
    return True
        

list1 = [1,3,4,5,22]
list2 = [1,5,4,5,22]

print(compare(list1,list2))
