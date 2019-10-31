# OnlineAppointmentBookingSystem

An Online Appointment Booking System for AltHealth with User as well as the Admin Side.

## Purpose

The purpose of this business is to provide alternative health care options to the people in the community. The owner is also the Health Care Practioner. It is an existing business and there are already a number of patients. The current system is developed in MS Excel and uses a hand filining system. The system works quite well, however the owner would like to expose the business and have an online presence as well. 
The staff of this business consists of two people:
1.  The Health Care Practisioner (HCP)
2.  General Administrative (GA) person that also acts as a secretary, handling the ordering and selling of supplements and assisting the owner in making appointments.

## The Proposed new System
The purpose of this section is to provide the specifications for a new proposed system that will replace the current system. The current data is provided and the new system has to use the current data as a point of entry.

## The new proposed system will consist of the following components:

## Operating System
The current operating system is Windows 10

## Database
There is currently no database installed. The owner does not have MS Access as part of the MS Office package. The proposed database has to be a relational database. The specific database is not precriptive; however it has to be open source and not require license fees. If it is a database that is operating system independent, so much the better, But a Windows based database would sufficent. Since the database has to be accessed via the Web browser and the *Mobile application,* the database has to be hosted in the cloud, but made available offline aswell.

I have decided to make use of MySQL for Azure database that will be hostes in the cloud.

## The Users of the System
> Manager     :   Username: hcp@althealth
                  password: hcp1alt
                 
> HCP          :   admin
              :   admin
                  
> GA           :   Username: admin
                  password: admin
                  
> Client       :   Username: user
                  password: user
                  
## Product Pespective
There is several omline appointment scheduling tools in the marketplace, some of which are feature-loaded, easy to setup and cheap. For doctors, online appointment scheduling brings a lot of value added services and benefits, like engaging the patient, making the patient feel appreciated, and being able to store patients data securely for future reference.

## Product Functions
Online appointment system with the key features listed below:

### For patients:
- Register as an patient account\
- Booking an appointment\
- Cancelling an appointment\
- View booking status\
- See doctor availability\

## For Manager:
- Book appointment\
- Update status of appointments\
- View appointment list\
- Cancel bookings\

## For HCP:
- Make appointments
- Create invoices\
- Add new products  to the supplent stock\
- MIS reports\

## For Genreal Administrative person (GA)
- Make appointments\
- Create invoices\
- Add products to the supplement stocks\

## Technologies used:
- HTML\
- CSS3\
- PHP\
- JavaScript\
- AJAX\
- SQL\
- jQuery\

## Software Requirement:
- PHP server like (XAMPP, WAMP) etc.\
- MySQL, phpMyAdmin for database \
- Web Browser supporting HTML: Google Chrome(recommended), Firefox, Edge etc \

## Step-wise instructions:
1. Open the PhpProject4.zip file in the zip folder.
2. Import it to wamp/xampp folder (Note: Username for phpMyAdmin is 'root'; password is 'ICT2613evaTeRry')
3. The opening file for the website is index.php file.
4. General Administrator and Manager login can be done through the same page. Login credentails are specified under Users of the System heading above.
5. Patient sign up opptions are also available at the index.php page.
6. Log out will directly redirect the user to the index.php page.


