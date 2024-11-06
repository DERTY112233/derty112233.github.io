#   MVS-TK5, The Perfect Learning Environment

When looking at the history of computers one day I looked into mainframes and the programming languages COBOL, REXX, JCL and even the low resource C (12 bit), and wanting to experiment, I looked for "Mainframe VM VirtualBox" and "Z/OS VM VirtualBox", religiously, to no avail. I went on to look through YouTube and found [Moshix](https://www.youtube.com/@moshixmainframechannel)(I will be referring to his content as his channel is far richer than what I could achieve) and how we are able to experiment with mainframes on a local machine and patch into it through various terminals. 

I seek to detail my experiences here.

### Reasons for the platform

I have always been interested in being economical with resources and this method for experimentation saves so much in terms of storage and memory usage, the directory where the files are stored, and the scripts are only -600mbs. I also like the way that the small system allows for easy backup should something fail.

### Requirements
1. MVS-TK5 [available here](https://www.prince-webdesign.nl/index.php/software/mvs-3-8j-turnkey-5) 
2. WX3270 [available here](https://sourceforge.net/projects/x3270/files/wx3270/wx3270-1.2ga4-setup.exe/download) 
3. Windows or Linux operating system
> [!WARNING]
> for this article I will be using a Windows system.
4. Patience
5. The TK5 Introduction and User Manual [available here](https://www.prince-webdesign.nl/images/downloads/TK5-Introduction-and-User-Manual.pdf) (this will come in handy) 


### Putting it all together

#### Installing the terminal 
This part is short and sweet, simply run the wx3270 setup executable installer and make sure that the installation is "full installation" and continue, we can leave it to install and continue on with the rest of the components

#### Setting up the MVS-TK5 system
This part is easy as well, locate where you downloaded the MVS-TK5 zip file and extract to a desired location what will be quick to navigate to, I use my D drive in a directory called "mainframe", I know, very creative right. Anyway, we need to run a script within the TK5 directory to start the system, so in a terminal, preferably CMD, when you have gone into the directory, run the mvs.bat script.

```powershell
.\mvs
```
After running this, you should see a lot of information running across the screen, don't be alarmed, just give it some time and you should see a screen like the one below
![the picture has some issues](/herc_console.png)
And now for some magic, press "ESC" to see the console in action.
Should look like the below
![the picture has some issues](/esc_console.png)
If all went well and the steps were followed, we have successfuly powered on our mainframe!!! Congrats

#### Let's patch in 
Starting up the wx3270 terminal we installed(it may not look like it's anything special but it packs a punch in features)
Locate the double pin plug and hover over it with your mouse, should say "Connect to a host", click that and use the default configuration which should be localhost 3270.

__you are now in__
__CONGRATULATIONS__

You should see a screen like the one after running the mvs startup script and you can interact with the system.
![The picture has some issues](/main_console.png)
When this is shown, press ENTER.
Now time to login, use the following user and press ENTER 
![The picture has some issues](/user.png)
And when on the screen below, use the following password and press ENTER
![The picture has some issues](/pass.png)
__CUL8TR__
ENTER again and then you should be met with some wisdom, will be different for you.
![The picture has some issues](/wisdom.png)
Press ENTER
