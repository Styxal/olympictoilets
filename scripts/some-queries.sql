# queries
# athlete with most golds
select a.athlete_id, a.full_name, m.medal_count
from olympics.athlete a
join olympics.athlete_medal m
on a.athlete_id = m.athlete_id
where m.medal_id = 1 #golds only
order by m.medal_count desc;

# What events did Michael Phelps and Yang Sun do
select a.athlete_id, a.full_name, e.event_name
from olympics.athlete a
join olympics.athlete_event ae
on a.athlete_id = ae.athlete_id
join olympics.olympic_event e
on ae.event_id = e.event_id
where a.athlete_id in (652,974)
order by a.full_name, e.event_name;

# Which countries got the most medals
select c.country_id, c.country_name, sum(m.medal_count)
from olympics.athlete a
join olympics.athlete_medal m
on a.athlete_id = m.athlete_id
join olympics.country c
on a.country_id = c.country_id
#where m.medal_id = 1 #golds only
group by c.country_id, c.country_name
order by sum(m.medal_count) desc;

# UK medals
select a.full_name, c.country_name, m.medal_name, am.medal_count
from olympics.athlete a
join olympics.athlete_medal am
on a.athlete_id = am.athlete_id
join olympics.country c
on a.country_id = c.country_id
join olympics.medal m
on am.medal_id = m.medal_id
where c.country_id in (63)
order by m.medal_id, am.medal_count desc, a.full_name;

