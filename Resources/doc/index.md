#Volleyball
##Fixtures Bundle

###Defaults
| Symbol | Name                                    | Default Value | Formula       | Description |
| ------:| --------------------------------------- |:-------------:| -------------:| -------------------------------------------------------------- |
| o      | volleyball_fixtures_organization        | 2             | o = o         | 2 organizaitons                                                |
| c      | volleyball_fixtures_council             | 4             | c = (o * 2)   | 2 councils per organizaiton                                    |
| r      | volleyball_fixtures_region              | 8             | r = (c * 2)   | 2 regions per council                                          |
| pt     | volleyball_fixtures_passel_type         | 2             | pt = (o + 2)  | 2 passel types                                                 |
| p      | volleyball_fixtures_passel              | 16            | p = (r * 2)   | 2 passels per region                                           |
| pf     | volleyball_fixtures_faction             | 32            | pf = (p * 2)  | 2 factions per passel                                          |
| al     | volleyball_fixtures_attendee_level      | 2             | al = (o * 2)  | 2 attendee levels                                              |
| ap     | volleyball_fixtures_attendee_position   | 4             | ap = (pt * 2) | 2 positions per passel type                                    |
| l      | volleyball_fixtures_leader              | 32            | l = (p * 2)   | 2 leaders per passel                                           |
| a      | volleyball_fixtures_attendee            | 64            | a = (pf * 2)  | 2 attendees per faction                                        |
| f      | volleyball_fixtures_facility            | 8             | f = (c * 2)   | 2 facilities per council                                       |
| d      | volleyball_fixtures_department          | 16            | d = (f * 2)   | 2 departments per facility                                     |
| q      | volleyball_fixtures_quarters            | 32            | q = (f * 4)   | 4 quarters per facility, 2 passel quarters, 2 faculty quarters |
| fp     | volleyball_fixtures_facility_position   | 4             | fp = (o * 2)  | 2 positions per organization                                   |
| ff     | volleyball_fixtures_faculty             | 16            | ff = (f * 2)  | 2 faculty per facility                                         |
| s      | volleyball_fixtures_season              | 16            | s = (f * 2)   | 2 seasons per facility                                         |
| w      | volleyball_fixtures_week                | 32            | w = (s * 2)   | 2 weeks per season                                             |
| pd     | volleyball_fixtures_period              | 96            | pd = (w * 3)  | 3 periods per week                                             |
| cr     | volleyball_fixtures_course              | 8             | cr = (o * 4)  | 4 courses per organization                                     |
| rq     | volleyball_fixtures_requirement         | 32            | rq = (cr * 4) | 4 requirements (2 parents, 2 children) per course              |
| fc     | volleyball_fixtures_facility_course     | 64            | fc = (s * 2)  | 2 facility courses per season                                  |
| cl     | volleyball_fixtures_class               | 64            | cl = (fc * 2) | 8 classes per course                                           |
| u      | volleyball_fixtures_user                | 2             | u = u         | 2 users, 1 admin, 1 user                                       |
| pe     | volleyball_fixtures_passel_enrollment   | 32            | pe = (p * 2)  | 2 enrollments per passel                                       |
| ae     | volleyball_fixtures_attendee_enrollment | 128           | ae = (a * 2)  | 2 enrollments per attendee                                     |
| cs     | volleyball_fixtures_carousel            | 2             | cs = cs       | 2 carousels                                                    |
| ci     | volleyball_fixtures_carousel_item       | 6             | ci = (cs * 3) | 3 carousel items per carousel                                  |
| ad     | volleyball_fixtures_address             | 15            | ad = ad       | 15 addresses                                                   |
| aa     | volleyball_fixtures_active_enrollment   | 2             | aa = u        | 1 per user                                                     |
| rp     | volleyball_fixtures_report              | 1             | rp = rp       | 1 report                                                        |
    
