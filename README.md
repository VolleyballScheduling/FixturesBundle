#Volleyball - Summercamp Scheduling System
##Data Fixtures Bundle
Entity | Quantity | Calculation Formula
--- |: --- :| --- 
Address | 50 | $address = ($facility + $leader + $attendee + $faculty)
Admin | 1 | 
Attendee | 16 | $attendee = ($faction * 2)
Attendee Enrollment | 512 | $aenrollment = ($penrollment * ($class / $season))
Attendee Level | 4 |  
Attendee Position | 4 | $aposition = ($ptype * 2)
Carousel | 1 |
Carousel Item | 3 | $cari = ($car * 3)
Class | 128 | $class = ($fcr * ($class / $season))
Council | 4 | $council = ($org * 2)
Course | 8 | $crs = ($o * 4)
Department | 8 | $dep = ($facility * 2)
Facility | 4 | $facility = $council
Facility Course | 64 | $fcr = ($season * $crs)
Faculty | 8 | $faculty = ($facility * 2)
Faculty Position | 4 | 
Faculty Quarters | 8 | $fquarters = ($facility * 2)
Leader | 8 | $leader = ($passel * 2)
Organization | 2 |
Passel | 4 | $p = ($pty + 2)
Passel Enrollment | 32 | $penrollment = ($passel * $season)
Passel Quarters | 8 | $pquarters = ($facility * 2)
Passel Type | 2 | $ptype = $org
Period | 32 | $period = ($week * 2)
Region | 8 | $region = ($council * 2)
Report | 1 | 
Requirement | 32 | $requirement = ($course * 4)
Season | 8 | $season = ($8 * 2)
User | |
Week | 16 | $week = ($season * 2)
