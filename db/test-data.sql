INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Erik Butcher", "nacl", "insecuretestpassword", "false@mock.com", "America/Denver");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Glabe Moon", "NaFl", "dummyuser", "moon@flowers.ilb", "America/New_York");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Combs Estes", "PnCr", "thepeanutcracker", "estes@jazzhands.ilb", "America/Denver");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Nagomi McDaniel", "TFJC", "rightontime", "mcdaniel@crabs.ilb", "America/New_York");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Spears Taylor", "TFJC", "voulgeguisarme", "spears@fridays.ilb", "Pacific/Honolulu");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Kayleigh Gravity", "NtOn", "sufficientforce", "gravity@degaulle.vxm", "America/New_York");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("Gunbrand Eriksen", "fPtF", "gudleguredliverdandi", "eriksen@arendal.nwy", "Europe/Oslo");

INSERT INTO user(username, salt, hash, email, timezone)
VALUES ("George Allenton", "dWCG", "microscales", "dragonbreath@degaulle.vxm", "America/New_York");

INSERT INTO onetimeevent(name, description, required_users, minimum_users, user_id)
VALUES ("ILB Siphons Meet-n-Greet", "We do all know each other already, but how has your new connection to the Blooddrain affected you? Let's find out", "[2, 3, 4, 5]", 4, 3);

INSERT INTO recurevent(name, description, required_users, minimum_users, user_id)
VALUES ("Valorous Video", "Apparently there's something weird we have in common?", "[6, 7]", 2, 6);

INSERT INTO useronetime(user_id, onetimeevent_id, start_time, duration)
VALUES (2, 1, '2020-10-18 08:00');

INSERT INTO useronetime(user_id, onetimeevent_id, start_time, duration)
VALUES (2, 1, '2020-10-18 09:00');

INSERT INTO useronetime(user_id, onetimeevent_id, start_time, duration)
VALUES (2, 1, '2020-10-18 10:00');

INSERT INTO useronetime(user_id, onetimeevent_id, start_time, duration)
VALUES (3, 1, '2020-10-18 14:00');

INSERT INTO useronetime(user_id, onetimeevent_id, start_time, duration)
VALUES (4, 1, '2020-10-18 18:00');

INSERT INTO userrecur(user_id, recurevent_id, day_of_week, hour_of_day, duration)
VALUES (6, 1, 'Thursdays', '18:00', '3 hours');

INSERT INTO userrecur(user_id, recurevent_id, day_of_week, hour_of_day, duration)
VALUES (7, 1, 'Wednesdays', '18:00', '3 hours');

INSERT INTO userrecur(user_id, recurevent_id, day_of_week, hour_of_day, duration)
VALUES (8, 1, 'Wednesdays', '18:00', '3 hours');
