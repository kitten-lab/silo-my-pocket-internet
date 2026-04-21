# charlieTHREADS
_a tagging and threading system for silo entities_

## what are charlieTHREADS?
named after charlie from always sunny in the episode where he finds himself working in the mailroom, **charlieTHREADS** is a structured tagging system derived from a light, loose form custom DSL. it allows for the ease of tracking entities, relationships, events and whatever else you feed into it, over time and narrative weight (usage count). instead of simple ta, each thread capture who recorded what, when, and the context of the material it was recorded in.

## core ideas
- tags are not static labels
- tags are the threadwork between all entities contained in **silo**.
- tags are posted alongside other ingestion tools (postBASIC, reportBASIC, JUKEBOX, etc)
- tags are written in a lightweight format with 3 positions

## data shapes
tags begin as a lightweight custom DSL.  
a raw string-example: `NEWS*MEDIA>SKYLINE-NEWS;SKYLINE-NEWS*section>updates;`

all threads are parsed through tagSPLICER and return ready for json formatting.
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

