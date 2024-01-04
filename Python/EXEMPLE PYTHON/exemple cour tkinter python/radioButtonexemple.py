from tkinter import *

def sel():
    select=v.get()
    fenetre.config(bg=select)

fenetre = Tk()
v = StringVar()
v.set("Python")
r1 = Radiobutton(fenetre,text="Rouge",value="red",variable=v,command=sel)
r2 = Radiobutton(fenetre,text="blue",value="blue",variable=v,command=sel)
r3 = Radiobutton(fenetre,text="vert",value="green",variable=v,command=sel)
r1.pack()
r2.pack()
r3.pack()
fenetre.mainloop()