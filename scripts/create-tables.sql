#drop schema olympics;

#create schema olympics;

create table olympics.region (
	region_id integer,
    region_name varchar(30),
    
    PRIMARY KEY (region_id)
);

create table olympics.income (
	income_id integer,
    income_name varchar(30),
    
    PRIMARY KEY (income_id)
);

create table olympics.country (
	country_id integer,
    country_name varchar(50),
    ioc_country_code char(3),
    iso2c char(2),
    iso3c char(3),
    gdp_per_capita float,
    life_expectancy float,
    population integer,
    region_id integer,
    income_id integer,
    latitude float,
    longitude float,
    
    PRIMARY KEY (country_id),
    FOREIGN KEY (region_id) REFERENCES olympics.region (region_id),
    FOREIGN KEY (income_id) REFERENCES olympics.income (income_id)    
);
    
create table olympics.town (
	town_id integer,
    town_name varchar(50) not null,
    
    PRIMARY KEY (town_id)
);

create table olympics.athlete (
	athlete_id integer,
    full_name varchar(50) NOT NULL,
    country_id integer NOT NULL,
    age integer NOT NULL,
    height_cm integer,
    weight_kg integer,
    sex char(1) NOT NULL,
    date_of_birth date,
    home_town_id integer,
    
    PRIMARY KEY (athlete_id),
    FOREIGN KEY (country_id) REFERENCES olympics.country (country_id),
    FOREIGN KEY (home_town_id) REFERENCES olympics.town (town_id)
);

create table olympics.medal (
	medal_id integer,
    medal_name varchar(6) not null,
    
    PRIMARY KEY (medal_id)
);

create table olympics.athlete_medal (
	athlete_id integer NOT NULL,
    medal_id integer NOT NULL,
    medal_count float NOT NULL,
    
    FOREIGN KEY (athlete_id) REFERENCES olympics.athlete (athlete_id),
    FOREIGN KEY (medal_id) REFERENCES olympics.medal (medal_id)
);

ALTER TABLE olympics.athlete_medal ADD constraint unique (athlete_id, medal_id);

create table olympics.sport (
	sport_id integer,
    sport_name varchar(50) not null,
    
    PRIMARY KEY (sport_id)
);

create table olympics.olympic_event (
	event_id integer,
    event_name varchar(50) not null,
    sport_id integer not null,
    
    PRIMARY KEY (event_id),
    FOREIGN KEY (sport_id) REFERENCES olympics.sport (sport_id)
);

create table olympics.athlete_event (
	athlete_id integer NOT NULL,
    event_id integer NOT NULL,
    
    FOREIGN KEY (athlete_id) REFERENCES olympics.athlete (athlete_id),
    FOREIGN KEY (event_id) REFERENCES olympics.olympic_event (event_id)
);
