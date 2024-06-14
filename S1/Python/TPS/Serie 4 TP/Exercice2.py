import math
class Point:
    def __init__(self,x,y):
        self.x=x
        self.y=y


class Vecteur:
    def __init__(self,P1,P2):
        self.A=P1
        self.B=P2

    def coordonnees(self):
        return {"X":self.B.x-self.A.x,"Y":self.B.y-self.A.y}

    def inverser(self):
        self.A,self.B=self.B,self.A
    
    def longueur(self):
        return math.sqrt((self.B.x-self.A.x)**2+(self.B.y-self.A.y)**2)

    def angleAxeX(self):
        return math.atan((self.B.x-self.A.x)/(self.B.y-self.A.y))
    
    def etaler(self,d):
        dx=math.cos(self.angleAxeX())*d
        dy=math.sin(self.angleAxeX())*d
        self.B.x+=dx
        self.B.y+=dy    

A=Point(1,1)
B=Point(3,4)

v=Vecteur(A,B)
v.inverser()
print(v.coordonnees())
print("La longueur du vecteur est : ",v.longueur())