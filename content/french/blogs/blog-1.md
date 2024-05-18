---
title: "Hack the Box — Starting Point — Meow Machine write up"
date: 2024-04-17T15:40:24+06:00
# talks thumb
image : "images/blogs/meowpwnd.png"
draft: false
# description
description: "This is meta description"
---

Welcome to my first write-up on Hack the Box! In this article, I'll guide you through the steps to conquer the "Meow" machine, a part of the 'Starting Point' labs with a 'Very Easy' difficulty rating.

<hr>


To begin, log in to the Hack the Box portal and head to the Starting Point page. You'll be presented with the option to choose between a `PWNBOX` or an `OVPN` (OpenVPN) connection. I opted for the `OVPN` method, utilizing Kali Linux through VirtualBox. Simply download the VPN (.ovpn) configuration file and execute the following command in your terminal:\

<hr>

```bash
sudo openvpn [filename].ovpn
```
<hr>

Remember to replace `"[filename]"` with the actual name of your downloaded `.ovpn` file for the Starting Point lab. Look for the `"Initialization Sequence Completed"` line in the terminal, confirming your successful connection to the Meow machine.

<hr>

Refresh the browser page to see the new connection and activate the machine by clicking the `'Spawn Machine'` button. Once the machine is active, note the target IP address.

<hr>

Now, proceed to tackle the tasks provided by the Meow machine. I've summarized the answers to each task below:

> **VM Acronym:** <br>
> Virtual Machine

> **Tool for Command Line Interaction:** <br>
> Terminal

> **Service for VPN Connection to HTB labs:** <br>
> OpenVPN

> **Abbreviated Name for 'Tunnel Interface':** <br>
> tun

> **Tool for ICMP Echo Requests:** <br>
> Ping

> **Common Tool for Finding Open Ports:** <br>
> Nmap

> **Service on Port 23/tcp:** <br>
> Telnet

> **Username for Telnet Login (Blank Password):** <br>
> root (Try admin or administrator if root fails)

> **Submit Root Flag:** <br>
> Conduct an nmap scan on the target IP, identifying an open port 23/tcp with the Telnet service. Use the command `telnet [Target_IP]` in the terminal, providing "root" as the username. Execute the `ls` command to list available directories/files, locate "flag.txt," and use `cat flag.txt` to view its content. Copy the flag value and submit it in the browser.

Upon successful completion, you'll receive a `"Meow has been Pwned"` message.

In conclusion, by running an nmap scan on `[target_ip]`, we discovered an open port 23/tcp with the Telnet service. Connecting to the target server using telnet `[target_ip]` with the "root" username, we navigated through directories, found "flag.txt," and solved the challenge. Happy hacking!

