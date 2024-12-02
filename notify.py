from twilio.rest import Client
import tkinter as tk
from tkinter import messagebox

def send_sms(to_phone_number, alert_message):
    account_sid = 'sid number'
    auth_token = 'token'
    client = Client(account_sid, auth_token)
    
    message = client.messages.create(
        body=alert_message,
        from_='+0000000000',  # Your Twilio phone number
        to=to_phone_number
    )
    print(f"Message sent to {to_phone_number} with SID: {message.sid}")

def is_valid_phone_number(phone_number):
    return phone_number.startswith('+') and phone_number[1:].isdigit() and len(phone_number) > 10

def send_alert():
    phone_numbers = phone_entry.get().split(',')
    alert_message = message_entry.get()
    
    if not alert_message:
        messagebox.showerror("Input Error", "Please enter an alert message.")
        return
    
    if not phone_numbers or any(not is_valid_phone_number(number.strip()) for number in phone_numbers):
        messagebox.showerror("Input Error", "Please enter valid phone numbers in the format +<country_code><number>, separated by commas.")
        return
    
    for number in phone_numbers:
        send_sms(number.strip(), alert_message)
    
    phone_entry.delete(0, tk.END)
    message_entry.delete(0, tk.END)

# Setting up the Tkinter GUI
root = tk.Tk()
root.title("Disaster Alert System")
root.configure(bg="#f0f8ff")  # Set background color

# Alert message label and entry
tk.Label(root, text="Alert Message:", font=("Helvetica", 12), bg="#f0f8ff").grid(row=0, column=0, pady=10, padx=10, sticky='w')
message_entry = tk.Entry(root, width=50, font=("Helvetica", 12), bd=3)
message_entry.grid(row=0, column=1, pady=10)

# Phone numbers label and entry
tk.Label(root, text="Phone Numbers (comma separated):", font=("Helvetica", 12), bg="#f0f8ff").grid(row=1, column=0, pady=10, padx=10, sticky='w')
phone_entry = tk.Entry(root, width=50, font=("Helvetica", 12), bd=3)
phone_entry.grid(row=1, column=1, pady=10)

# Send alert button
send_button = tk.Button(root, text="Send Alert", command=send_alert, font=("Helvetica", 14), bg="#4CAF50", fg="white", bd=3)
send_button.grid(row=2, columnspan=2, pady=20)

# Center the window
root.geometry("500x250")
root.mainloop()
