# charlieTHREADS
_a tagging and threading system for silo entities_

## what are charlieTHREADS?
named after charlie from always sunny in the episode where he finds himself working in the mailroom, **charlieTHREADS** is a structured tagging system derived from a light, loose form custom DSL. it allows for the ease of tracking entities, relationships, events and whatever else you feed into it, over time and narrative weight (usage count). instead of simple tags, each thread capture who recorded what, when, and the context of the material it was recorded in.
### usage example
```
input:
`SDK-808*felt>sadness;`

result:
- entity: SDK-808  
- category: felt  
- value: sadness  
- recorded with timestamp + source crate  
```
## core ideas
- tags are not static labels
- tags are the threadwork between all entities contained in **silo**.
- tags are posted alongside other ingestion tools (postBASIC, reportBASIC, JUKEBOX, etc)
- tags are written in a lightweight format with 3 positions

## why this matters

charlieTHREADS turns tagging into a temporal, relational system.

- preserves history instead of overwriting state  
- allows multiple perspectives (who reported what)  
- enables time-based queries (first mention, last mention, frequency)  
- supports conflicting or evolving truths  

this allows silo to function less like a notes app and more like a living data network.
## data shapes
tags begin as a lightweight custom DSL.  
a raw string-example: `NEWS*MEDIA>SKYLINE-NEWS;SKYLINE-NEWS*section>updates;`

```
### parser
``` DSL format
`A*B>C;`

- `A` = source entity  
- `*` = relationship separator  
- `B` = category / context  
- `>` = directional link  
- `C` = target entity  
- `;` = statement terminator
```

all tags are parsed into structured json and then projected into multiple lookup systems depending on context:
### chestersCRATE system basic tag payload:
```
        "tags": {
            "news": {
                "media": [
                    "skyline-news"
                ]
            },
            "skyline-news": {
                "section": [
                    "updates"
                ]
            }
        },
```


and the sent out to be threaded into several reports (examples are various contexts, not all the example string):
### - by single-word lookup
```
{
    "media": {
        "gravity": 1,
        "news": {
            "weight": 1,
            "skyline-news": {
                "weight": 1,
                "reported_by": {
                    "SKYLINE-REPORTER": {
                        "1776806032": [
                            "crate.91C7D7CA0B3E81AF"
                        ]
                    }
                }
            }
        }
    }
}
```
### - by entity 
```
{
    "name": "news",
    "gravity": 1,
    "tps_metadata": {
        "added": {
            "cUID": "crate.91C7D7CA0B3E81AF",
            "unix": 1776806032
        },
        "updated": {
            "cUID": "crate.91C7D7CA0B3E81AF",
            "unix": 1776806032
        }
    },
    "contents": {
        "media": {
            "gravity": 1,
            "tps_metadata": {
                "added": {
                    "cUID": "crate.91C7D7CA0B3E81AF",
                    "unix": 1776806032
                },
                "updated": {
                    "cUID": "crate.91C7D7CA0B3E81AF",
                    "unix": 1776806032
                }
            },
            "bin": {
                "skyline-news": {
                    "gravity": 1,
                    "tps_metadata": {
                        "added": {
                            "cUID": "crate.91C7D7CA0B3E81AF",
                            "unix": 1776806032
                        },
                        "updated": {
                            "cUID": "crate.91C7D7CA0B3E81AF",
                            "unix": 1776806032
                        }
                    }
                }
            }
        }
    }
}
```
### - by insect (intersections)
"insect" views show overlapping relationships across entities—where multiple threads converge into shared meaning.
```
{
    "name": "remembers",
    "gravity": 33,
    "tps_metadata": [],
    "remembers": {
        "sdk-808": {
            "weight": 33,
            "bin": {
                "jace": 11,
                "glenshadow": 11,
                "wbs": 11
            }
        }
    }
}
```
### - and by relations 
```
{
    "name": "hymn",
    "gravity": 11,
    "tps_metadata": {
        "added": {
            "cUID": "crate.DCA1352FE41D4F36",
            "unix": 1776802656
        },
        "updated": {
            "cUID": "crate.55B6F0683A627A11",
            "unix": 1776803285
        }
    },
    "hymn": {
        "crate": {
            "weight": 3,
            "bin": {
                "about": 3
            }
        }
    },
    "contents": {
        "about": {
            "gravity": 8,
            "tps_metadata": {
                "added": {
                    "cUID": "crate.DCA1352FE41D4F36",
                    "unix": 1776802656
                },
                "updated": {
                    "cUID": "crate.55B6F0683A627A11",
                    "unix": 1776803285
                }
            },
            "bin": {
                "hymn": {
                    "gravity": 8,
                    "tps_metadata": {
                        "added": {
                            "cUID": "crate.DCA1352FE41D4F36",
                            "unix": 1776802656
                        },
                        "updated": {
                            "cUID": "crate.55B6F0683A627A11",
                            "unix": 1776803285
                        }
                    }
                }
            }
        }
    }
}
```

