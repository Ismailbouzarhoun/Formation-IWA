from tkinter import *

fenetre=Tk()
case1 = Checkbutton(fenetre, text="Python",width=10,height=2,selectcolor="red")
case2 = Checkbutton(fenetre, text="Java",width=10,height=2)
case3 = Checkbutton(fenetre, text="PHP",width=10,height=2)

case1.pack(anchor=W)
case2.pack(anchor=W)
case3.pack(anchor=W)
fenetre.mainloop()