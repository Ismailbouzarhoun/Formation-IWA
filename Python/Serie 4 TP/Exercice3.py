import math

class Point:
    def __init__(self, x, y):
        self.x = x
        self.y = y

class Polygone:
    def __init__(self, points):
        self.points = points

    def calculer_longueur(self):
        longueur = 0
        for i in range(len(self.points)):
            x1, y1 = self.points[i].x, self.points[i].y
            x2, y2 = self.points[(i + 1) % len(self.points)].x, self.points[(i + 1) % len(self.points)].y

            distance = math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2)
            longueur += distance
        return longueur

    def deplacer(self, dx, dy):
        for point in self.points:
            point.x += dx
            point.y += dy

class Rectangle:
    def __init__(self, p1, p2):
        self.p1 = p1
        self.p2 = p2

    def surface(self):
        x1, y1 = self.p1.x, self.p1.y
        x2, y2 = self.p2.x, self.p2.y

        larg = abs(x2 - x1)
        long = abs(y2 - y1)

        return long * larg

    def contient(self, point):
        return self.p1.x <= point.x <= self.p2.x and self.p1.y <= point.y <= self.p2.y

    def show(self):
        print(f"Point 1 : x : {self.p1.x}, y: {self.p1.y}")
        print(f"Point 2 : x : {self.p2.x}, y: {self.p2.y}")
        print(f"Point 3 : x : {self.p1.x}, y: {self.p2.y}")
        print(f"Point 4 : x : {self.p2.x}, y: {self.p1.y}")

p1 = Point(1, 2)
p2 = Point(5, 7)
points = [p1, p2]
p = Polygone(points)
print("Longueur du polygone:", p.calculer_longueur())

r = Rectangle(p1, p2)
print("Surface du rectangle:", r.surface())
