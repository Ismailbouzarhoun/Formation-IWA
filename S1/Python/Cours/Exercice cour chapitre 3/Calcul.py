class Calcul:
    def __init__(self):
        pass
    def factorielle(self, n):
        somme = 1
        for i in range(2,n+1):
            somme*=i
        return somme

    def somme(self, n):
        return n*(n+1)/2
    
    def testPrim(self, n):
        if n==1 or n==2:
            return False
        for i in range(2,n):
            if n%i==0:
                return False
        return True

    def tableMult(self, n):
        for i in range(10):
            print(i," * ",n," = ",n*i)
    @staticmethod
    def listDiv(self, n):
        liste=[]
        for i in range(1,n):
            if n%i==0:
                liste.append(i)
        return liste 


cal = Calcul()