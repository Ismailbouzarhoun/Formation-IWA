from tkinter import *

fenetre = Tk()

def hellonew():
    print("Hello")
    
def hellosave():
    print("Hello save")
    
def helloopen():
    print("Hello save")


menubar = Menu(fenetre)
filemenu = Menu(menubar, tearoff=0)
menubar.add_cascade(label="file",menu=filemenu)
filemenu.add_command(label="New",command=hellonew)
filemenu.add_command(label="save",command=hellosave)
filemenu.add_command(label="open",command=helloopen)

menubar.add_command(label="quit",command=fenetre.quit)

fenetre.config(menu=menubar)
fenetre.mainloop()
