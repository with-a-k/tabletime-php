-- This "CASCADE" keyword will also drop tables that depend on user.
DROP TABLE IF EXISTS public.tabletime_user CASCADE;

CREATE TABLE public.tabletime_user
(
  id  SERIAL NOT NULL PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  hash VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  timezone VARCHAR(100) NOT NULL DEFAULT "To Be Added"
);

-- One-time Events use concrete dates such as October 15th, 2020.

CREATE TABLE public.onetimeevent
(
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    -- "Required Users" is an array of user IDs.
    -- It will need extra care during preprocessing.
    required_users VARCHAR(100) NOT NULL,
    -- "Minimum Users" is the number of attendees required to hold the event.
    minimum_users INT NOT NULL,
    -- This specifically references the user creating the event.
    user_id INT NOT NULL REFERENCES public.tabletime_user(id)
);

-- Recurring Events use abstract dates such as "Saturdays",
-- so data such as user availability needs to be stored differently.
-- It is possible this is bad form. Please let me know in submission comments
-- if combining One-Time and Recurring events is feasible.
-- Maybe it is?

CREATE TABLE public.recurevent
(
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    required_users VARCHAR(100) NOT NULL,
    minimum_users INT NOT NULL,
    user_id INT NOT NULL REFERENCES public.tabletime_user(id)
);

CREATE TABLE public.useronetime
(
  id SERIAL NOT NULL PRIMARY KEY,
  user_id INT NOT NULL REFERENCES public.tabletime_user(id),
  onetimeevent_id INT NOT NULL REFERENCES public.onetimeevent(id),
  start_time TIMESTAMP WITH TIME ZONE NOT NULL,
  duration INTERVAL NOT NULL DEFAULT '1 hour'
);

CREATE TABLE public.userrecur
(
  id SERIAL NOT NULL PRIMARY KEY,
  user_id INT NOT NULL REFERENCES public.tabletime_user(id),
  recurevent_id INT NOT NULL REFERENCES public.recurevent(id),
  -- Since recurring events deal with abstract dates,
  -- the date and time data types may not be appropriate.
  day_of_week VARCHAR(100) NOT NULL,
  hour_of_day VARCHAR(100) NOT NULL,
  duration VARCHAR(100) NOT NULL DEFAULT '1 hour'
);

CREATE TABLE public.onetimesuggestion
(
  id SERIAL NOT NULL PRIMARY KEY,
  onetimeevent_id INT NOT NULL REFERENCES public.onetimeevent(id),
  -- like the event's "required users", "attending users"
  -- is an array of User IDs.
  users_attending VARCHAR(100) NOT NULL,
  start_time TIMESTAMP WITH TIME ZONE NOT NULL,
  duration INTERVAL NOT NULL DEFAULT '1 hour'
);

CREATE TABLE public.recursuggestion
(
  id SERIAL NOT NULL PRIMARY KEY,
  recurevent_id INT NOT NULL REFERENCES public.recurevent(id),
  users_attending VARCHAR(100) NOT NULL,
  day_of_week VARCHAR(100) NOT NULL,
  hour_of_day VARCHAR(100) NOT NULL,
  duration VARCHAR(100) NOT NULL DEFAULT '1 hour'
);

SET intervalstyle = 'postgres_verbose';
