from tkinter import *

fenetre = Tk()
txt = Text(fenetre,height=10,width=50)
txt.insert(INSERT,"Hello.....\n")
txt.insert(END,"Welcome to IWA")

txt.pack()
txt.tag_add("Hello",'1.0','1.5')
txt.tag_add("iwa",'2.11','2.14')
txt.tag_config("Hello",background='red',foreground='blue')
txt.tag_config("iwa",background='black',foreground='white')
fenetre.mainloop()