import math
class Point2D:
    def __init__(self,x,y):
        self.x=x
        self.y=y
    def afficher(self):
        print("x : ",self.x,"y : ",self.y)
    
    def deplacer(self,dx,dy):
        self.x+=dx
        self.y+=dy
    
    def distance(self,P):
        return math.sqrt((P.x-self.x)**2)+((P.y-self.y)**2)
    

class Point3D(Point2D):
    def __init__(self,x,y,z):
        super().__init__(x,y)
        self.z=z
    def afficher(self):
        super().afficher()
        print("z : ",self.z)
    def deplacer(self,dx,dy,dz):
        super().deplacer(dx,dy)
        self.z+=dz
    def distance(self, P):
        return math.sqrt((P.x-self.x)**2+(P.y-self.y)**2+(P.z-self.z)**2)

P1 = Point2D(1,1)
P2 = Point3D(3,4,7)
P1.afficher()
P2.afficher()