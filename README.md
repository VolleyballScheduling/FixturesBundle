VolleyballFixturesBundle
========================
Data Fixtures
-------------
| Entity              | Quantity | Calculation Formula                                     |
| ------------------- |:--------:| -------------------------------------------------------:|
| Address             | 50       | $address = ($facility + $leader + $attendee + $faculty) |
| Admin               | 1        |                                                         |
| Attendee            | 16       | $attendee = ($faction * 2)                              |
| Attendee Enrollment | 512      | $aenrollment = ($penrollment * ($class / $season))      |
| Attendee Level      | 4        |                                                         |
| Attendee Position   | 4        | $aposition = ($ptypepe * 2)                             |
| Carousel            | 1        |                                                         |
| Carousel Item       | 3        | $carouselItem = ($carousel * 3)                         |
| Class               | 128      | $class = ($facilityCourse * ($class / $season))         |
| Council             | 4        | $council = ($organization * 2)                          |
| Course              | 8        | $course = ($organization * 4)                           |
| Department          | 8        | $department = ($facility * 2)                           |
| Facility            | 4        | $facility = $council                                    | 
| Facility Course     | 64       | $facilityCourse = ($season * $course)                   |
| Faculty             | 8        | $faculty = ($facility * 2)                              |
| Faculty Position    | 4        |                                                         |
| Faculty Quarters    | 8        | $facultyQuarters = ($facility * 2)                      |
| Leader              | 8        | $leader = ($passel * 2)                                 |
| Organization        | 2        |                                                         |
| Passel              | 4        | $passel = ($passelType + 2)                             |
| Passel Enrollment   | 32       | $penrollment = ($passel * $season)                      |
| Passel Quarters     | 8        | $pquarters = ($facility * 2)                            |
| Passel Type         | 2        | $ptype = $organization                                  |
| Period              | 32       | $period = ($week * 2)                                   |
| Region              | 8        | $region = ($council * 2)                                |
| Report              | 1        |                                                         |
| Requirement         | 32       | $requirement = ($course * 4)                            |
| Season              | 8        | $season = ($8 * 2)                                      |
| User                |          |                                                         |
| Week                | 16       | $week = ($season * 2)                                   |
