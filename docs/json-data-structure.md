# DEPO Data Documentation v1.0
_CHESTER'S IMPORTS DATA FILE STRUCTURE_  

This document covers the basic shapes of the data structure held in the json files used for Chester's Imports crating system.
```
QUICK TERMINOLOGY GUIDE
DEPO	=	dues ex pocket online
CUID	=	chester's imports identifier
TPS		=	time placement system
TUID	=	chester's imports time chest id
```
## top level

**`CUID`** - Chester's UNIQUE ID. The unique ID for the payload chests of all content recorded in the **DEPO**    
**`CUID-version`** - The current versioning number of the crate style, presently `3`  
**`content`** - the **payload** of any given event in the DEPO.  
**`route`** - route is used when a payload is moving from one environment to another inside the DEPO.  
**`tags`** - tags explode at ;, use : for namespace, used all on ingestors for common shared query layer  
**`environment`** - All context related to where the payload event occurred  
**`tool`** - All details related to the tool used for the payload production  
**`origin`** - For material from other storage vessels, this section captures where material is coming from.  
**`TPS`** - "Time Position System" a time system for tracking exploded time details according to EVENT, not INGEST 


## sub-levels
### content types (payloads)

**`timber`** - Type of payload. Contains a simple **leaf** of text, and an optional **topic**  

### route data

**`from`** -  where is this payload coming from  
- **`mod`** -  the mod who submitted the payload, environment contains the remainder of originating data.

**`to`** -  where is this payload heading  
- **`mod`** - the entity the payload is towards   
- **`room`** - the operating room the payload is towards  
- **`dom`** - the section or department of the environment the room is in  
- **`sys`** - the campus or main system the payload is toward  

### environment data

**`viewport`** - unused element, for Book of lens switching during ingestion  
**`sys`** - system the payload was ingested, slug and display name  
**`dom`** -	dominion the payload was ingested, slug and display name  
**`mod`** - moderator the payload was ingested through, slug and display name  
**`room`** - the page / room of the payload ingestion in DEPO  

### tool data
**`name`** - the name of the Tool, also related to its path    
**`function`** - The tool's function used (ie "Add", "Edit", "List", etc)    

### origin data
**`material`** - category for material origins  
**`type`** - what type of material? chat log, vault, etc  
**`source`** - metadata about the source material  
- **`name`** - the name of the material  
- **`id`** - any particular unique ID for the material  
- **`created_on`** - start time stamp unix on material  
- **`last_modified`** - end/last modified unix timestamp if applicable

**`references`** - References more specific than above  
- **`refs`** - for listing more specific tags and reference material globally during ingestion

**`notes`** - human layer plain text notes about the material  

### tps data

**`ingest_unix`** -	unix timestamp of when the payload entered DEPO  
**`event_unix`** - unix timestamp of when event happened in material (if not use ingest)   
**`TUID`** - unique TIME id which connects to a different report for numeric tracking  
**`timezone`** - the timezone, stored for time-printing purposes
