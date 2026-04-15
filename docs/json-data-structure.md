# DEPO Data Structure in json files

## main common nests

- [[CUID]]

Chester's UNIQUE ID. The unique ID for the payload chests of all content recorded in the [[Dues Ex Pocket Online]]

- [[chester_crate schema (json data)]]

The current versioning number of the crate style, presently `3`

- [[content (json payload)]]
	the **payload** of any given event in the DEPO.

- [[route (json data)]]
  route is used when a payload is moving from one environment to another inside the DEPO.

- [[tags (json data)]]
  tags explode at ;, use : for namespace, used all on ingestors for common shared query layer

- [[environment (json data)]]
	All context related to where the payload event occurred

- [[tool (json data)]]
	All details related to the tool used for the payload production

- [[origin (json data)]]
  Since a large amount of my material is from other storage vessels, the following section captures where material is coming from.

- [[TPS (json data)]]
	"Time Position System" a time system for tracking exploded time details according to EVENT, not INGEST 


## content types (payloads)

-  [[timber (json; payload type)]]
	Type of payload. Contains a simple [[leaf (payload)]] of text, and an optional [[topic (leaf header)]]

## route data

- [[from (json; route data)]]
  where is this payload coming from 
	- [[mod (from; route data)]]
	  the mod who submitted the payload, environment contains the remainder of originating data.
- [[to (json; route data)]]
  where is this payload heading
	- [[mod (to; route data)]]
		the entity the payload is towards
	- [[room (to; route data)]]
	  the operating room the payload is towards
	- [[dom (to; route data]]
		the section or department of the environment the room is in
	- [[sys (to; route data)]]
		the campus or main system the payload is toward

## environment data

- [[viewport]]
	unused element, for Book of lens switching during ingestion
- [[sys (json; environment data)]]
  system the payload was ingested, slug and display name	
- [[dom (json; environment data)]]
	dominion the payload was ingested, slug and display name	
- [[mod (json; environment data)]]
	moderator the payload was ingested through, slug and display name	
- [[room (json; environment data)]]
	the page / room of the payload ingestion in DEPO

## tool data

- [[name (json; tool data)]]
	the name of the Tool, also related to its path
- [[function (json; tool data)]]
	The tool's function used (ie "Add", "Edit", "List", etc)

## origin data

- [[material (json data)]]
	- [[type (json; material data)]]
		what type of material? chat log, vault, etc
	- [[source (json; material data)]]
		metadata about the source material
		- [[name (json; material data)]]
			the name of the material
		- [[id (json; material data)]]
			any particular unique ID for the material
		- [[created_on (json; material data)]]
			start time stamp unix on material
		- [[last_modified (json; material data)]]
			end/last modified unix timestamp if applicable
	- [[reference (json; material data)]]
		References more specific than above
		- [[ref (json; material data)]]
		  for listing more specific tags and reference material globally during ingestion
	- [[notes (json; material data)]]
		human layer plain text notes about the material

## tps data

- [[ingest_unix (json; time data)]]
	unix timestamp of when the payload entered DEPO
- [[event_unix (json; time data)]]
	unix timestamp of when event happened in material (if not use ingest)
- [[TUID]]
	unique TIME id which connects to a different report for numeric tracking
- [[timezone (json; time data)]]
  the timezone, stored for time-printing purposes