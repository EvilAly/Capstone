from tkinter import *
# from PIL import ImageTk,Image
import sqlite3
import datetime
root = Tk()
root.title("Secure Student Login")

conn = sqlite3.connect('Studentlogin.db')
c = conn.cursor()


#actions for log in button
def logIn(lname, cl):
    try:
        #Verify Last Name/Class Combo in Roster
        code = getID(lname, cl)
        if (code != None) and (code.isDigit()):
            loginLabel = Label(root, text="You are Logged In.")
            loginLabel.grid(row=4,column=0, pady=10, padx=10, ipadx=70)
            now = datetime.datetime.now()                    
            c.execute("INSERT INTO LabLog (NameCodeID, TimeIN) VALUES (?, ?)", (code, now,))
            conn.commit()
        else:
            loginLabel = Label(root, text="Match not found.")
            loginLabel.grid(row=4,column=0, pady=10, padx=10, ipadx=70)
    except OperationalError:
        print("Cannot Connect to Database.")

#actions for log out button
def logOut(lname, cl):
    try:
        #Verify Last Name/Combo in Roster
        code = getID(lname, cl)
        if (code != None) and (code.isDigit()):
            loginLabel = Label(root, text="You are Logged Out.")
            loginLabel.grid(row=4,column=0, pady=10, padx=10, ipadx=70)
            now = datetime.datetime.now()
            c.execute("UPDATE LabLog SET TimeOut = ? WHERE TimeOut IS NULL AND NameCodeID = ?", (now, code,))
            conn.commit()
        else:
            loginLabel = Label(root, text="Match not found.")
            loginLabel.grid(row=4,column=0, pady=10, padx=10, ipadx=70)
            
    except OperationalError:
        print("Cannot Connect to Database.")
        
def getID(lname, cl):
    #get roster information
    try:
        cl = cl.replace(',', '').replace('(', '').replace(')', '').replace('\'', '')
        #print(cl)
        c.execute("SELECT * FROM Roster WHERE LastName = ?", (lname,))
        rosters = c.fetchall()
        #print(rosters)
        #compare entry with roster
        if rosters:
            for roster in rosters:
                if roster[2] == cl:
                    #print("user found")
                #if in roster
                    code = roster[0]
                    return code
                else:
                    loginLabel = Label(root, text="You Are Not Registered.")
                    loginLabel.grid(row=4,column=0, pady=10, padx=10, ipadx=70)
                    return 'None'
    except OperationalError:
        print("Cannot Connect to Database.")
        
    
c.execute("SELECT ClassCode FROM Classes")
classes = c.fetchall()

# Create Text Box
l_name_box = Entry(root, width=30)
l_name_box.grid(row=1, column=0, columnspan=2)

# Create Text Box Labels
l_name = Label(root, text="Please Enter Last Name")
l_name.grid(row=0, column=0, columnspan=2)


variable = StringVar(root)
variable.set ("Please Select Class") #default value

class_drop = OptionMenu(root, variable, *classes)
class_drop.grid(row=2,column=0, pady=10, padx=10, ipadx=70, columnspan=2)

login_btn = Button(root, text="Sign In", command=lambda: logIn(l_name_box.get().title(), variable.get()))
login_btn.grid(row=3,column=0, pady=10, padx=10, ipadx=25)

logout_btn = Button(root, text="Sign Out", command=lambda: logOut(l_name_box.get().title(), variable.get()))
logout_btn.grid(row=3,column=1, pady=10, padx=10, ipadx=25)

conn.commit()


root.mainloop()
