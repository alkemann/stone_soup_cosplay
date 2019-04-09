# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: eu-cdbr-west-02.cleardb.net (MySQL 5.6.42-log)
# Database: heroku_41af0c0666ec5b2
# Generation Time: 2019-04-09 15:45:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table challenges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `challenges`;

CREATE TABLE `challenges` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `description` text,
  `setnr` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `background` varchar(128) NOT NULL,
  `gods` varchar(128) NOT NULL,
  `species` varchar(128) NOT NULL,
  `conduct_name_1` varchar(45) DEFAULT NULL,
  `conduct_1` text,
  `conduct_name_2` varchar(45) DEFAULT NULL,
  `conduct_2` text,
  `conduct_name_3` varchar(45) DEFAULT NULL,
  `conduct_3` text,
  `bonus_name_1` varchar(45) DEFAULT NULL,
  `bonus_1` text,
  `bonus_name_2` varchar(45) DEFAULT NULL,
  `bonus_2` text,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(128) DEFAULT NULL,
  `reddit` text,
  `draft` tinyint(1) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `wiki` text,
  `shortform` varchar(128) DEFAULT NULL,
  `special_rule` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

LOCK TABLES `challenges` WRITE;
/*!40000 ALTER TABLE `challenges` DISABLE KEYS */;

INSERT INTO `challenges` (`id`, `name`, `description`, `setnr`, `week`, `background`, `gods`, `species`, `conduct_name_1`, `conduct_1`, `conduct_name_2`, `conduct_2`, `conduct_name_3`, `conduct_3`, `bonus_name_1`, `bonus_1`, `bonus_name_2`, `bonus_2`, `created`, `icon`, `reddit`, `draft`, `active`, `wiki`, `shortform`, `special_rule`)
VALUES
	(1,'Psyche the Insane Magess','A fair-haired mage, wandering and seemingly half-mad with grief and guilt.',4,1,'Mage','Xom','Human','Weapons','Use only short blades, stones, nets, blowguns with needles, and untrained unarmed combat. You can still wield magical staves, and artefacts of other weapon types, but not attack with them. You can also use chaos-branded weapons of any type, including ranged weapons and the Mace of Variability.','Armour','Wear only light armour (ER 4 or less).\r\n','Magic','Train Hexes or Evocations to skill level 14.','Venus Luxure','Win the game after having obtained the iron rune from Dis, but without killing Dispater.','The Things We Do For Love','Perform any three \"impossible\" tasks from the list below. The wording on these tasks is carefully chosen, so that most tasks have several possible solutions. I\'m going to be very lenient as to what qualifies as accomplishing a task, and creativity is encouraged, so if you are wondering \"does it count if I...\" then the answer is very likely yes. (You can ask anyhow though, if you really need to. Use a spoiler tag if you\'re posting in the thread.)\r\n\r\nWhen you accomplish a task, take a screenshot, or make a note with : !cosplay, and post the screenshots or write what tasks you did when you post your morgue. If you forget to screenshot/note, you\'ll have to tell me both what you did and when. You only get credit for tasks that you knowingly complete! The assistance file does not track these tasks, sorry.\r\n\r\n1. Get chunks of flesh from a lava serpent.\r\n\r\n2. Drown a flying creature.\r\n\r\n3. Have 3 friendly elementals of different types in LOS at the same time.\r\n\r\n4. Have a friendly undead kraken in LOS.\r\n\r\n5. Put at least four status effects on an Orb of Fire at once. Press x and move the cursor over it to verify. *Clarification:* by status effects, I mean descriptors when you move the cursor over it, e.g. \"covered in acid\" if you corrode one with a wand of acid counts as one status effect.\r\n\r\n6. Get Geryon to leave Hell without killing him.\r\n\r\n7. Help a slave to kill its master.\r\n\r\n8. Kill Boris and Natasha, then reunite them while they are alive.\r\n\r\n9. Exit the dungeon and win the game, with a friendly Golden Dragon in view. Annotate with !cosplay before you leave.','2019-03-23 13:53:35','https://i.imgur.com/IBkRaAF.png','https://www.reddit.com/r/dcss/comments/b19trd/crawl_cosplay_challenge_set_4_week_1_psyche_the/',0,0,'http://crawl.chaosforge.org/Psyche','HuMa^Xom',NULL),
	(11,'Bai Suzhen, Madam White Snake','A weary draconian with foreign and watery scales. She has come to the Dungeon in hopes of resurrecting her mortal husband; a noble cause, for a being once known for quarrelling with saints and flooding unfortunate temples. If pressed to her limits, she will reveal her true form, the mere sight of which struck her husband dead. Adventurers may wish they were so lucky!',4,2,'Gladiator (with Staff)','Fedhas or Qazlal','Draconian','Weapons','Train only Fighting, Staves, Unarmed Combat, and Throwing for weapon skills.','Magic','Don\'t learn or cast any necromancy spells.','Evocations','Have three different rechargeable evocables in your inventory. (Possible items: lamp of fire, phial of floods, fan of gales, lightning rod, and the Horn of Geryon.)','Tempestuous','Reach skill level 27 in invocations, before you reach XL27. (Sorry agentoutlier! I\'m moving away from these for the future but there will still be a couple once in a while.)','The Dragon Experience','Be in dragon form from the time you enter Zot onward, and win the game. You don\'t have to be in dragon form for resting/auto-travel/running away/etc.\r\n\r\nIf you collect at least 4 runes and still don\'t have access to dragon form, you can enter Zot anyhow. In this case you must fight unarmed with no shield, but you can use other form-changing transmutation spells. If you find a book with dragon form while in Zot, you must switch to using it. Please don\'t try to game this exception by intentionally avoiding spellbooks, etc.','2019-03-23 13:46:56','https://i.imgur.com/edVQdwC.png','https://www.reddit.com/r/dcss/comments/b41vrl/crawl_cosplay_challenge_set_4_week_2_bai_suzhen/',0,0,'http://crawl.chaosforge.org/Bai_Suzhen',NULL,NULL),
	(21,'Frances, Duchess of Pandemonium','A stout warrior who once bested a powerful lord of Pandemonium in combat, gaining control over the demon\'s realm and thanes. The battle left her with a deep facial scar, one that she carries as a badge of honour rather than a symbol of shame.',3,5,'Gladiator','Makhleb','Hu/Ds','Armour','Don\'t wear any type of dragon scales.','Invocations','Train Invocations to skill level 14 (if human) or 21 (if demonspawn).','Branch','Enter Pandemonium. You don\'t have to do anything there.\r\n\r\nIf you\'ve never been in Pan before, know that exits are random and never guaranteed on a Pan level, though you\'re sure to find one eventually. Many exits are through the Abyss; it\'s helpful to have the Abyssal rune beforehand.','Scar Tissue','Reach the bottom of Lair without using any potions or scrolls.','Frances Farmer Will Have Her Revenge','Get a rune from Pandemonium during the orb run.','2019-03-23 18:23:38','https://i.imgur.com/W4qYTTm.png','https://www.reddit.com/r/dcss/comments/aym89n/crawl_cosplay_challenge_set_3_week_5_frances/',0,0,'http://crawl.chaosforge.org/Frances',NULL,NULL),
	(31,'The Lernaean Hydra','A huge beast, mightiest of hydras, infamous in myth and legend. It flows through the water faster than a human can run, swatting aside trees as though they were matchsticks. Its many heads slaver and gnash constantly as it hunts for prey to slake its bottomless appetite.',3,4,'Transmuter','Ash/Ely/Oka','Merfolk','Weapons','Only train Fighting and Unarmed Combat for weapons skills.\r\n','Magic','Don\'t use any Conjurations or Necromancy spells, except for Regeneration and Sublimation of Blood.\r\n','Transmutations','Reach skill level 16 in Transmutations (base skill for Ash followers), and never cast Statue Form.','Eight Heads Are Better Than One','Don\'t use any form-changing spells, except Hydra Form and Blade Hands, from the time you enter Depths onwards. You still must also master Transmutations for this challenge.','A Little Too Mouthy','Don\'t train evocations, and don\'t use any wands, evocable items, or evocable abilities. (This includes evoking rage, flight, etc., but not reaching from polearms.) Equipment that provides evocable abilites can still be used, as long as you don\'t make use of those abilities. Boots of flying can be worn; you start out flying, and are prevented from landing while wearing them, under this challenge.\r\n\r\nClarification on abilities: Only evocable abilities are prohibited. God abilities and others that don\'t use evocations (blink from mutation, dragon\'s breath, etc.) are still allowed.','2019-03-23 19:07:37','https://i.imgur.com/Twr0bCo.png','https://www.reddit.com/r/dcss/comments/aw1o2h/crawl_cosplay_challenge_set_3_week_4_the_lernaean/',0,0,'http://crawl.chaosforge.org/The_Lernaean_hydra',NULL,NULL),
	(41,'Khufu the Undying Pharaoh','An incredibly powerful emperor on the way to godhood. He died quite some time ago, but he sees no reason why that should stop him.',4,3,'Any','Kikubaaqudgha or Yredelemnul','Mummy / Ghoul','Species','Play a Mummy','Branch','Enter the Tomb. You don\'t need to do anything there.','Undead','Always have Necromancy (with Kiku) or Invocations (with Yred) as your highest skill, when you have any skills higher than skill level 10. If you die before you have any skills higher than 10, you still must have Necro/Invo as your highest skill to get the points for this conduct.','Re-animator','Collect a rune with at least 48 undead allies in LOS. Take a screenshot or make a note with : !cosplay.\r\n\r\nIf there are no other creatures in sight, pressing ctrl-X should show you undead allies all the way to capital V. Also, 48 allies makes a 7x7 square with you somewhere in the middle. (There\'s no requirement for them to be in a square though, that\'s just a helpful visual guide.)','The True Pharaoh','Get all 6 runes that aren\'t from Pan or Hell, and win the game.','2019-03-23 23:49:19','https://i.imgur.com/OQHErB7.png','https://www.reddit.com/r/dcss/comments/b6rrgd/crawl_cosplay_challenge_set_4_week_3_khufu_the/',0,0,'http://crawl.chaosforge.org/Khufu',NULL,NULL),
	(51,'Grum the Hunter','A tough-looking gnoll, wearing the pelt of one of his former war dogs.',3,3,'Summoner','Okawaru','Gnoll','Magic','Don\'t cast any conjurations spells. \"Conjurations-like\" spells such as poisonous vapours, ignition, etc. are fine.','Armour','Don\'t use a shield. Amulets of reflection are allowed.\r\n','Branch','Collect 5 runes.','Who Let the Dogs Out?','Have a canine of each type in the game visible in LOS at the same. Summons count, but undead don\'t. Make a note with : !cosplay, or take a screenshot if you prefer. If you use the assistance file, the screen will flash on jackals, raiju, and doom hounds (and now hell hounds) coming into view, but not the others as they are common enough that it would be annoying IMO. (Jackals are actually quite rare after the first few floors of the Dungeon.)\r\n\r\nFull list of doggos: Jackal, Hound, Wolf, Warg, Hell Hound, Raiju, Doom Hound.\r\n\r\nedit: I\'m going to be pretty lenient about missing a canine or two, since it\'s pretty clear that monster appearance is too unpredictable. Hell Hounds, Raiju, and Doom Hounds are always going to be required though, and you should try to get a Jackal unless the RNG really screws you over.\r\n','Gnoll and Void','Get the Abyssal rune from Abyss:5, before entering the Depths. The assistance file will flash the screen on finding the Depths entrance; you should place an exclusion on it if you want more of a reminder/safeguard.','2019-03-23 23:59:15','https://i.imgur.com/t3oqH3s.png','https://www.reddit.com/r/dcss/comments/alzylu/crawl_cosplay_challenge_set_3_week_3_grum_the/',0,0,'http://crawl.chaosforge.org/Grum',NULL,NULL),
	(61,'Mara, Lord of Illusions','This tall and powerful demon is Mara, Lord of Illusions, mighty among dreamers. He is capable of creating intricately detailed illusions, so real that they are almost as deadly as the creatures they impersonate.',3,1,'Fire Elementalist','Dithmenos','Demonspawn','Weapons','Don\'t use any short blades, two-handed weapons, or ranged weapons except nets and stones. Using and training unarmed combat is allowed.\r\n','Armour','Wear light armour (ER 4 or lower). Monstrous Demonspawn and those with the \"sturdy frame\" innate mutation can wear armour with ER 10 or lower. All must avoid casting Ice/Hydra/Statue/Dragon form.','Magic','Learn at least one of Shadow Creatures, Spellforged Servitor, Summon Greater Demon, or Haunt, castable at 10% fail or less without brilliance.','Use Your Illusion','Use a phantom mirror on Antaeus, then kill Antaeus before the duplicate expires. You must also see the duplicate at some point after Antaeus has been killed. (In case you use fog, etc.) If done correctly, Cocytus will still have an automatic annotation that Antaeus is present, even though you killed him. (Please no one fix/report this bug yet!)\r\n\r\nedit: When I first posted the challenge, it was with Geryon, but I decided to make it harder. Games started by Friday at Noon GMT can still mirror and kill Geryon instead.\r\n','The Wheel of Empire','Reach Depths:5 before you enter a rune branch. Banishment doesn\'t count, but don\'t get the rune, and leave when you can.','2019-03-24 00:01:38','https://i.imgur.com/OmV4hH6.png','https://www.reddit.com/r/dcss/comments/ah7bp3/crawl_cosplay_challenge_set_3_week_1_mara_ds_fe/',0,0,'http://crawl.chaosforge.org/Mara',NULL,NULL),
	(71,'Aizul the Neglectful Guardian','Once the primary guardian serpent of a legendary treasure hoard, she was disgraced after thieves looted it while she slept. She now slithers about the dungeon, seeking vengeance against all would-be looters. She is an accomplished spellcaster, but no more deadly in melee combat than others of her kind.',3,2,'Venom Mage','Ru/Usk/WJC','Felid','Weapons','Keep your unarmed combat skill at 7.5 or less. (At 6 UC, your attack delay is 0.89 which rounds to 0.9 most of the time.) Be mindful that skill targets can skill go over this number from killing a high-XP enemy, and won\'t turn off if met from potions of experience (the latter fixed in trunk!).','Allies','Don\'t cast Sticks to Snakes or Mana Vipers; Don\'t use any miscellaneous evocables that create allies: box of beasts, sack of spiders, phial of floods, phantom mirror, horn of Geryon. (Wands are fine.)','Stealth','Reach skill level 27 in stealth.','Answers Come In Dreams','Kill The Royal Jelly in one turn. (i.e. take it from full health to zero in one action; you can take as long as you need to set this up.) If you do this, make a note by pressing : and then entering !cosplay. If you hurt TRJ without killing it, you can retreat until it\'s back to full health. Beware of the jelly aftermath!\r\n\r\nStabbing is the \"obvious\" choice, but one-shot stabbing TRJ at full health will require might (or Serpent\'s Lash) if you\'re following the Weapons conduct, even at 27 stealth. Uskayaw\'s Grand Finale is another choice (but watch out for Pain Bond), and there could be other options -- Chain Lightning can do it if you have very high spell power, and you\'re lucky. Polymorphing TRJ might help you -- the resultant monster will probably have less HP than TRJ. Polymorphing will also cause TRJ to spit out all its jellies at once, and immolation plus a good AOE attack might do the trick, though if it doesn\'t be careful to make sure TRJ lives.','Snakeskin','Don\'t wear amulets of reflection, and don\'t cast Ice Form, Hydra Form, Statue Form, Dragon Form, or Necromutation.','2019-03-24 00:03:41','https://i.imgur.com/B2szO9u.png','https://www.reddit.com/r/dcss/comments/ajmg13/crawl_cosplay_challenge_set_3_week_2_aizul_the/',0,0,'http://crawl.chaosforge.org/Aizul',NULL,NULL),
	(81,'Bonus Week: Joseph, a Mercenary','Looks like a mercenary in a stupid-looking hat.',2,6,'Gladiator w/ quarterstaff, or Hunter w/ sling','Gozag','Human or Halfling','Weapons','Only train Staves, Slings, and Fighting for weapon skills.\r\n','Armour','Don\'t use a shield. Amulets of reflection are fine.\r\n','Magic','Cast at most a single spell, of your choice. (By this I mean cast one spell as many times as you want, not cast one spell once only.)','Assassin\'s Greed','Win the game with at least $10000 in gold.','Gold Digger','Get the golden rune from the Tomb.','2019-03-28 02:05:21','https://i.imgur.com/2E2Kk8Y.png','https://www.reddit.com/r/dcss/comments/aerja8/crawl_cosplay_challenge_bonus_week_1_joseph_a/',0,0,'http://crawl.chaosforge.org/Joseph',NULL,NULL),
	(91,'Nikola the Mad Inventor','A brilliant scientist obsessed with electricity. In his attempts to perfect his electric golem, he was involved in a terrible accident, and now phases in and out of reality.',2,5,'Air Elementalist','Ashenzari, Sif Muna, or Vehumet','Human or Vine Stalker','','','','','','','','','','','2019-03-28 02:12:02','https://i.imgur.com/SGa5aXH.png','https://www.reddit.com/r/dcss/comments/acf4j6/crawl_cosplay_challenge_set_2_week_55_nikola_the/',0,0,'http://crawl.chaosforge.org/Nikola',NULL,NULL),
	(101,'Ijyb the Twisted Goblin','A small and twisted goblin, wearing some ugly blue rags. She claims dominion over this level of the dungeon; the punishment for trespassing is death.',2,4,'Artificer','Gozag, Uskayaw (not in 0.18), or Pakellas (0.18 only)','Halfling','Weapons','Use only short blades, maces & flails, and throwing weapons (including blowguns). Untrained UC is also allowed.\r\n\r\n','Magic','Don\'t cast any spells that are level 4 or higher.\r\n','Evocations','Train evocations to at least skill level 16.','Clubbing All Night','From the time you enter your first rune branch (except the Abyss) until you get a rune (except the Abyssal rune), don\'t use any weapons except a club, including throwing weapons. The rune you get doesn\'t have to match the first rune branch you enter, but you have to stay with a club even if you back out of a branch. Unlike last week, this challenge is complete once you get a rune, and you can throw your club in the lava and go back to using a real weapon.\r\n\r\nIf you enter a timed portal (e.g. Ice Cave), you can switch back to other weapons while in this portal. If you worship Gozag, you can\'t bribe the branch you get the rune from, or else it doesn\'t fulfill this conduct.\r\n\r\nedit: To be clear, you can still enchant and brand your club with scrolls.','All Mine','Get all 15 runes. Note that in 0.18, Tomb is considerably easier, since the one-way stairs hadn\'t been implemented yet.','2019-03-28 02:15:24','https://i.imgur.com/23MPscv.png','https://www.reddit.com/r/dcss/comments/a89k7c/crawl_cosplay_challenge_set_2_week_45_ijyb_the/',0,0,'http://crawl.chaosforge.org/Ijyb',NULL,NULL),
	(111,'Sigmund the Dreaded','The elder of a pair of brothers who came for the Orb. No one knows what Sigmund saw in the dungeon to drive him mad, but his shrewd magical tactics and wicked scythe now leave little time for his victims to wonder. Despite his reputation as a vicious murderer, his grandiose and dramatic ways have earned him the admiration of many denizens of the dungeon.',2,3,'Gladiator w/ trident, Monk w/ spear, or Enchanter','Nemelex Xobeh','Human','Weapons','Use only polearms (and untrained unarmed combat) from XL10 onwards for weapons, including ranged weapons. This means no more nets for Gladiators and no more short blades for Enchanters. It is unlikely but possible that Enchanters will not find a polearm before XL10, in which case they\'ll just have to find other ways of dealing with monsters (or choose not to follow this conduct).\r\n','Armour','Don\'t wear armour with an ER higher than 11. This means no chain mail, plate or crystal plate armour, storm/shadow/gold dragon scales.\r\n','Magic','Have Hexes as your highest magic skill (including Spellcasting), when you have any magic skills at skill level 8 or higher. (Don\'t worry about other magic skills going over Hexes by a bit, or anything going over 8, as long as you make an honest effort to follow this conduct. I don\'t want you having to check your skills page every five minutes.)\r\n\r\nIf you don\'t train any magic schools over level 8, or even choose not to use magic at all, you don\'t need to train Hexes at all and you still qualify for this conduct.','Scythes Are So Bad I Forget They Exist','Use only scythes (and untrained UC) as weapons from the time you enter a rune branch -- edit: you can now go into depths or elf without a scythe. If you have a game in progress where you don\'t have a scythe, you can go back to another polearm if you leave whatever rune branch you\'re on. (Involuntary Abyss doesn\'t count but don\'t get the rune.) You must also train polearms to skill level 26.\r\n\r\nAs with the Weapons conduct, it is unlikely but possible that you won\'t find an appropriate weapon before you have to enter a branch that needs it, in which case you need to find other ways of dealing with monsters until you get a scythe.','Royal Flush','Kill The Royal Jelly using only cards. Specifically, anything that is the result of you drawing a card is allowed; anything that affects TRJ that is not the result of drawing a card is not allowed. This means things like immolation scrolls, casting Discord, non-Nemelex allies, etc., are prohibited, since even if they don\'t affect TRJ directly, they might indirectly through other affected enemies. Fog and the Darkness spell are allowed though, as are self-buffs like Haste.\r\n\r\nIf you make a mistake and affect TRJ with something other than a card, you can retreat and try again once TRJ is back to full health and with no status effects on it.\r\n\r\nYou are allowed to attack the jelly spawns with whatever means you want as long as TRJ is not and cannot be affected. If TRJ is not present, either because you retreated up a floor or you\'ve killed it, you can do whatever you want -- feel free to use immolation to clear up the spawns, for example.','2019-03-28 02:17:59','https://i.imgur.com/hUw8jkr.png','https://www.reddit.com/r/dcss/comments/a63pp2/crawl_cosplay_challenge_set_2_week_35_sigmund_the/',0,0,'http://crawl.chaosforge.org/Sigmund',NULL,NULL),
	(121,'Urug the Orcish Ballista','A coarse and lanky orc. Urug lost her eye in a fight with a harpy, and has sworn to slay every last one of them. Unfortunately, the vision in her remaining eye is not very good, and she has mistaken you for one. She smells terrible.',2,2,'Hunter (with Javelins)','Okawaru','Hill Orc','Weapons','Train your base Throwing skill to skill level 16.\r\n','Armour','Don\'t use a shield. Amulets of reflection are allowed.\r\n','Attributes','Always increase Strength for your attribute choice every 3rd level.','hunter2','Train only Fighting and Throwing for weapon skills. You can still use other weapons, and make use of Okawaru\'s Heroism.','Foot Soldier','Never intentionally fly, blink (controlled or uncontrolled), or make use of Dispersal traps (including intentionally luring enemies to step on them). Teleporting is still allowed. If you use-ID a potion of flight, wait it out if possible, otherwise don\'t travel over water or lava until it has expired. If you put on boots of flying, stop flying immediately. This challenge also means you can\'t cast the spells Dragon Form or Tornado, on the off-chance that you wanted to.','2019-03-28 02:21:22','https://i.imgur.com/U6vIjwf.png','https://www.reddit.com/r/dcss/comments/a3zdrd/crawl_cosplay_challenge_set_2_week_25_urug_the/',0,0,'http://crawl.chaosforge.org/Urug',NULL,NULL),
	(131,'Polyphemus the Watchful Shepherd','A cyclops shepherd, he is very protective of his charges, whom he watches with an undying fervor through his single massive eye. Nevertheless, he won\'t hesitate to use them as projectiles in a pinch; after all, the best defence is a good offence.',2,1,'Summoner','Hepliaklqana','Ogre','Weapons','Don\'t wield anything. This means you\'re limited to unarmed and throwing attacks, but also you can\'t wield staves or other things for stat bonuses even if you don\'t plan on hitting enemies with them. Equipping a shield is fine.','Summonings','Train your Summonings skill to at least 16.\r\n','Magic','Don\'t cast any spells with Transmutations, Necromancy, or Conjurations schools, or those that are purely elemental (e.g. Poisonsous Vapours). As an exception you can cast Haunt if you really want it.','You Can\'t Fight What You Can\'t See','Don\'t equip any equipment that grants SInv (see invisible). If you wear-id something with SInv, you must unequip it immediately; make sure you have remove curse on hand. You can still have the See Invisible or Antennae 3 mutations if you\'re lucky enough to get one.\r\n\r\nIf you are going to complete this challenge, please enter a note by pressing : and typing sinv challenge, preferably when you\'re about to pick up the Orb of Zot (e.g. when you\'re likely to win, and unlikely to stop trying for this challenge). If you forget you can still get credit for it, just make sure that you tell me that you didn\'t enter a note.\r\n\r\nTip: Your ancestor can see invisible creatures, as can Canine Familiar, and many other higher-level summons. Some monsters like Unseen Horrors can be polymorphed fairly easily.','Meatshields Up!','Have your Armour, Dodging and Shields skill below 5 for the entire game. If you use crawl\'s skill target feature, be aware of the following two bugs:\r\n\r\nIf you gain a lot of experience from one enemy it is possible for a skill to exceed a set target. You might want to set a target of 4.5 or lower, to have a bit of margin for error, and maybe even don\'t train those skills if you\'re about to kill a difficult/high XP enemy like early Sigmund.\r\n\r\nIf you quaff a potion of experience and meet or exceed a skill target, the skill won\'t be turned off for training, and you\'ll need to turn it off manually.','2019-03-28 02:23:51','https://i.imgur.com/E8O4npi.png','https://www.reddit.com/r/dcss/comments/a1pslv/crawl_cosplay_challenge_set_2_week_15_polyphemus/',0,0,'http://crawl.chaosforge.org/Polyphemus',NULL,NULL),
	(141,'Boris, Master of Life and Death','',1,15,'Conjurer','Any, but no abandoning. Recommended: Ash, Gozag, Ru, Veh, Kiku.','Mummy','','','','','','','','','','','2019-03-28 02:29:13','https://i.imgur.com/444q4Fw.png','https://www.reddit.com/r/dcss/comments/9rlseu/casual_cosplay_challenge_week_15_boris_mucj_plus/',0,0,'http://crawl.chaosforge.org/Boris',NULL,NULL),
	(151,'Mennas, the Voice of Zin','',1,14,'Fighter or Monk','Elyvilon, Zin, or The Shining One','Human','','','','','','','','','','','2019-03-28 02:36:43','https://i.imgur.com/RJVTPKK.png','https://www.reddit.com/comments/9pi9mn',0,0,'',NULL,NULL),
	(161,'Jorgrun Earthshaker','',1,13,'Earth Elementalist','Any, but you probably want Makhleb or Ru','Deep Dwarf','','','','','','','','','','','2019-03-28 02:39:39','https://i.imgur.com/Dq1YIid.png','https://www.reddit.com/comments/9nibpj',0,0,'',NULL,NULL),
	(171,'Saint Roka the Messiah','',1,12,'Monk','Beogh','Hill Orc','','','','','','','','','','','2019-03-28 02:41:55','https://i.imgur.com/ul56OEj.png','https://www.reddit.com/comments/9lkmhy',0,0,'',NULL,NULL),
	(181,'The Enchantress','',1,11,'Enchanter','Fedhas','Spriggan','','','','','','','','','','','2019-03-28 02:44:22','https://i.imgur.com/YFHGVz0.png','https://www.reddit.com/comments/9jno4t',0,0,'',NULL,NULL),
	(191,'Louise the Corrupted','',1,10,'Abyssal Knight, unless you attempt the first Bonus Challenge.','Lugonu','Human','','','','','','','','','','','2019-03-28 02:45:56','https://i.imgur.com/TcYXqXY.png','https://www.reddit.com/comments/9hli9c',0,0,'',NULL,NULL),
	(201,'Lom Lobon, Demon Lord of Forbidden Knowledge','',1,9,'Ice Elementalist or Air Elementalist','Sif Muna','Demonspawn','','','','','','','','','','','2019-03-28 02:48:54','https://i.imgur.com/zJqVNpT.png','https://www.reddit.com/comments/9g8n3v',0,0,'',NULL,NULL),
	(211,'Donald the Adventurer','',1,8,'Fighter','Okawaru','Merfolk or Barachi','','','','','','','','','','','2019-03-28 02:50:20','https://i.imgur.com/BolKza7.png','https://www.reddit.com/comments/9eb92r',0,0,'',NULL,NULL),
	(221,'Gastronok the Ponderous','',1,7,'Summoner or Wizard','Cheibriados','Octopode','','','','','','','','','','','2019-03-28 02:52:01','https://i.imgur.com/TZXe2E0.png','https://www.reddit.com/comments/9bz9id',0,0,'',NULL,NULL),
	(231,'Nessos the Markcentaur','',1,6,'Hunter or Arcane Marksman','Ashenzari','Centaur','','','','','','','','','','','2019-03-28 02:53:40','https://i.imgur.com/gXTQXkG.png','https://www.reddit.com/comments/949k4f',0,0,'',NULL,NULL),
	(241,'Jessica the Apprentice Sorceress','',1,5,'Any Mage except Necromancer','Kikubaaqudgha','Human','','','','','','','','','','','2019-03-28 02:55:24','https://i.imgur.com/fFBBpu6.png','https://www.reddit.com/r/dcss/comments/92cc7h/',0,0,'',NULL,NULL),
	(251,'Snorg the Insatiable','',1,4,'Berserker  ','Trog','Troll','','','','','','','','','','','2019-03-28 02:57:56','https://i.imgur.com/RGfTmw0.png','https://www.reddit.com/r/dcss/comments/90mq77/',0,0,'',NULL,NULL),
	(261,'Azrael the Boundless Flame','',1,3,'Fire Elementalist','Vehumet','Tengu  ','','','','','','','','','','','2019-03-28 02:59:43','https://i.imgur.com/oC0g0jv.png','https://www.reddit.com/r/dcss/comments/8yr8z4/',0,0,'',NULL,NULL),
	(271,'Sonja, the Graceful Assassin','',1,2,'Assassin, Abyssal Knight, or Warper','Dithmenos, Lugonu, Uskayaw, or Wu Jian Council','Kobold  ','','','','','','','','','','','2019-03-28 03:01:33','https://i.imgur.com/8xo7B9Z.png','https://www.reddit.com/r/dcss/comments/8wmaz2/',0,0,'',NULL,NULL),
	(281,'Joseph, a Mercenary','',1,1,'Gladiator with quarterstaff, or Hunter with sling','Gozag','Human  ','','','','','','','','','','','2019-03-28 03:02:39','https://i.imgur.com/eaRlZo2.png','https://www.reddit.com/r/dcss/comments/8uumii/',0,0,'',NULL,NULL),
	(291,'Asterion the Fallen King','Once a king infamous for waging bloodthirsty campaigns, Asterion was exiled to the depths of the dungeon for his crimes. Here he lurks in his tattered finery, dreaming of a new kingdom. In his lust for power, the minotaur king turned to the worship of Makhleb, and Makhleb has rewarded him with horrifying destructive might. ',4,4,'Fighter or Skald','Makhleb','Minotaur','Weapons','Don\'t use any two-handed weapons. One-handed ranged weapons and throwing weapons are allowed.','Armour','Don\'t wear any boots.','Fighting','Train fighting to at least skill level 21.','A History Of Violence','Play as a Skald. Have Spectral Weapon usable from the time you enter Lair/Orc/Depths, and the potential to make regular use of it. (This is a very fuzzy rule, because quantifying or enforcing it isn\'t really practical. Basically at least have the option to use your spells, instead of just ignoring them and going to the heaviest armour you can find.)\r\n\r\nYou must get at least one rune to earn the star for this challenge.','Myth Is The Minotaur','Win the game after fully exploring the first floor of each Hell branch. (You don\'t have to fly over deep water or lava, in Cocytus or Gehenna respectively.)','2019-04-04 03:02:54','https://i.imgur.com/EwauEHZ.png','https://www.reddit.com/r/dcss/comments/b9lanh/crawl_cosplay_challenge_set_4_week_4_asterion_the/',0,1,'http://crawl.chaosforge.org/Asterion','','You are allowed to play this challenge in version 0.14. Here is a lot of text to test out how things will format on long special rules. Play as a Skald. Have Spectral Weapon usable from the time you enter Lair/Orc/Depths, and the potential to make regular use of it. (This is a very fuzzy rule, because quantifying or enforcing it isn\'t really practical. Basically at least have the option to use your spells, instead of just ignoring them and going to the heaviest armour you can find.) You must get at least one rune to earn the star for this challenge.');

/*!40000 ALTER TABLE `challenges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table players
# ------------------------------------------------------------

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`id`, `name`, `reddit`, `discord`, `created`)
VALUES
	(11,'lextramoth','lextramoth','alkemann','2019-03-23 13:41:45'),
	(21,'pedritolo','pedritolo','pedritolo','2019-03-23 13:50:46'),
	(31,'Ge0ff','N-M-L','N-M-L','2019-03-23 13:51:05'),
	(41,'TheMeInTeam','TheMeInTeam','TheMeInTeam','2019-03-23 13:51:14'),
	(51,'ManMan','inertia709','ManMan','2019-03-23 13:51:23'),
	(61,'blorx1','blorx1','blorx1','2019-03-23 13:51:30'),
	(71,'EthnicCake','kitchen_ace','EthnicCake','2019-03-23 13:51:39'),
	(81,'RoGGa','RoGGa-loves-DCSS','RoGGa-loves-DCSS','2019-03-23 13:51:47'),
	(91,'agentgt','agentgt','agentgt','2019-03-23 13:51:56'),
	(101,'ADarkStormyNight','ADarkStormyNight','ADarkStormyNight','2019-03-23 13:52:08'),
	(111,'Xqipyl','GnollSet','GnollSet','2019-03-23 13:52:16'),
	(121,'trondwin','trondwin','trondwin','2019-03-23 13:52:25'),
	(141,'SvalbardCaretaker','SvalbardCaretaker ','SvalbardCaretaker ','2019-03-23 18:07:53'),
	(151,'demenzo','demenzo','demenzo','2019-03-23 18:33:18'),
	(161,'Dazliare','Dazliare','Dazliare','2019-03-23 18:45:54'),
	(171,'Eldin','NightWolf','NightWolf','2019-03-23 18:57:14'),
	(181,'Amao','NoSenpaiNo','Amao','2019-03-23 19:01:02'),
	(191,'razor4143','razor4143','razor4143','2019-03-23 19:02:31'),
	(201,'utrick','utrick','utrick','2019-03-23 19:04:17'),
	(211,'Zukil','Zukilprime','Zukilprime','2019-03-23 19:25:17'),
	(221,'melvinkitnick','melvinkitnick','melvinkitnick','2019-03-24 00:35:25'),
	(231,'EvilAliv3','EvilAliv3','EvilAliv3','2019-03-24 15:18:02'),
	(241,'Astinus_Lorekeeper','Astinus_Lorekeeper','Astinus_Lorekeeper','2019-03-24 15:19:56'),
	(251,'Malacante','Malacante','Malacante','2019-03-24 15:24:37'),
	(261,'sushi','sushi','sushi','2019-03-24 15:25:44'),
	(271,'sharkfinsouperman','sharkfinsouperman','sharkfinsouperman','2019-03-24 15:28:10'),
	(281,'floraline','floraline','floraline','2019-03-24 15:29:05'),
	(291,'Djent','Djent','Djent','2019-03-25 14:05:14'),
	(301,'Slacking101','Slacking_101','Slacking_101','2019-03-26 00:20:23'),
	(311,'Monsterracer','Monsterracer','Monsterracer','2019-03-26 17:50:21'),
	(321,'aperiodic','aperiodic','aperiodic','2019-03-28 22:56:04'),
	(331,'vgb414','vgb414','vgb414','2019-03-28 22:59:04'),
	(341,'chumloofah','chumloofah','chumloofah','2019-03-28 23:12:30'),
	(351,'samspot','samspot','samspot','2019-03-28 23:14:17');

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table submissions
# ------------------------------------------------------------

LOCK TABLES `submissions` WRITE;
/*!40000 ALTER TABLE `submissions` DISABLE KEYS */;

INSERT INTO `submissions` (`id`, `challenge_id`, `player_id`, `score`, `stars`, `morgue_url`, `morgue_text`, `created`, `hs`, `accepted`, `online`, `comment`)
VALUES
	(21,1,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190318-104647.txt',NULL,'2019-03-23 13:55:25',1,1,1,''),
	(31,1,41,50,2,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190318-045430.txt',NULL,'2019-03-23 13:55:32',1,1,1,''),
	(41,1,51,50,2,'https://crawl.kelbi.org/crawl/morgue/manman/morgue-manman-20190319-050347.txt',NULL,'2019-03-23 13:55:37',1,1,1,''),
	(51,1,61,50,2,'https://crawl.kelbi.org/crawl/morgue/blorx1/morgue-blorx1-20190320-145234.txt',NULL,'2019-03-23 13:55:49',1,1,1,''),
	(61,1,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190318-063308.txt',NULL,'2019-03-23 13:56:03',1,1,1,''),
	(71,1,81,45,0,'http://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190316-045027.txt',NULL,'2019-03-23 13:56:44',1,1,1,''),
	(81,1,91,45,0,'http://crawl.berotato.org/crawl/morgue/agentgt/morgue-agentgt-20190319-154409.txt',NULL,'2019-03-23 13:56:58',1,1,1,''),
	(101,1,111,22,0,'https://crawl.kelbi.org/crawl/morgue/Xqipyl/morgue-Xqipyl-20190322-065041.txt',NULL,'2019-03-23 13:57:25',1,1,1,''),
	(111,1,121,15,0,'https://pastebin.com/raw/awfrWgW8',NULL,'2019-03-23 13:57:38',1,1,0,''),
	(131,11,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190322-223458.txt',NULL,'2019-03-23 17:45:42',1,1,1,NULL),
	(141,11,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190323-155612.txt',NULL,'2019-03-23 18:05:31',1,1,1,NULL),
	(151,11,141,30,0,'http://crawl.develz.org/morgues/git/svalbard/morgue-svalbard-20190322-173829.txt',NULL,'2019-03-23 18:10:26',1,1,1,NULL),
	(171,21,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190312-021213.txt',NULL,'2019-03-23 18:25:36',1,1,1,NULL),
	(181,21,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190310-065933.txt',NULL,'2019-03-23 18:28:49',1,1,1,NULL),
	(191,21,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190309-071810.txt',NULL,'2019-03-23 18:30:48',1,1,1,NULL),
	(201,21,61,50,2,'https://crawl.kelbi.org/crawl/morgue/blorx1/morgue-blorx1-20190314-045351.txt',NULL,'2019-03-23 18:32:18',1,1,1,NULL),
	(211,21,151,50,2,'http://crawl.berotato.org/crawl/morgue/demenzo/morgue-demenzo-20190310-063252.txt',NULL,'2019-03-23 18:36:02',1,1,1,NULL),
	(231,21,41,50,1,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190309-083808.txt',NULL,'2019-03-23 18:40:02',1,1,1,NULL),
	(241,21,111,37,0,'https://pastebin.com/t2c67Hj9',NULL,'2019-03-23 18:45:08',1,1,1,NULL),
	(251,21,161,50,1,'http://crawl.berotato.org/crawl/morgue/Dazliare/morgue-Dazliare-20190309-070651.txt',NULL,'2019-03-23 18:46:35',1,1,1,NULL),
	(261,21,81,40,0,'http://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190311-034312.txt',NULL,'2019-03-23 18:47:32',1,1,1,NULL),
	(271,21,121,45,0,'https://pastebin.com/raw/viisGnVT',NULL,'2019-03-23 18:49:41',1,1,1,NULL),
	(281,21,91,50,2,'http://crawl.berotato.org/crawl/morgue/agentgt/morgue-agentgt-20190314-185833.txt',NULL,'2019-03-23 18:56:28',1,1,1,NULL),
	(291,21,171,35,0,'http://crawl.akrasiac.org/rawdata/Eldin/Eldin.txt',NULL,'2019-03-23 18:58:00',1,1,1,NULL),
	(301,21,181,50,1,'https://crawl.kelbi.org/crawl/morgue/Amao/morgue-Amao-20190308-210113.txt',NULL,'2019-03-23 19:01:57',1,1,1,NULL),
	(311,21,191,50,0,'https://pastebin.com/raw/w83xjMK8',NULL,'2019-03-23 19:03:46',1,1,1,NULL),
	(321,21,201,40,0,'https://webzook.net/soup/morgue/trunk/utrick/morgue-utrick-20190312-162143.txt',NULL,'2019-03-23 19:05:56',1,1,1,NULL),
	(331,11,41,50,2,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190323-184925.txt',NULL,'2019-03-23 19:20:46',1,1,1,NULL),
	(341,11,211,15,0,'http://crawl.berotato.org/crawl/morgue/Zukil/morgue-Zukil-20190323-183743.txt',NULL,'2019-03-23 19:28:04',1,1,1,NULL),
	(351,31,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190303-170617.txt',NULL,'2019-03-23 23:07:57',1,1,1,NULL),
	(361,31,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190303-063027.txt',NULL,'2019-03-23 23:09:42',1,1,1,NULL),
	(371,31,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190304-093735.txt',NULL,'2019-03-23 23:13:32',0,1,1,NULL),
	(381,31,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190303-164631.txt',NULL,'2019-03-23 23:31:55',1,1,1,NULL),
	(391,31,151,50,2,'',NULL,'2019-03-24 00:18:01',1,1,1,NULL),
	(401,31,41,50,2,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190308-030620.txt',NULL,'2019-03-24 00:19:05',1,1,1,NULL),
	(411,31,111,37,0,'https://pastebin.com/raw/XbHtHAg4',NULL,'2019-03-24 00:23:08',1,1,1,NULL),
	(421,31,161,30,0,'http://crawl.berotato.org/crawl/morgue/Dazliare/morgue-Dazliare-20190302-175629.txt',NULL,'2019-03-24 00:24:55',1,1,1,NULL),
	(431,31,81,35,0,'',NULL,'2019-03-24 00:26:16',1,1,1,''),
	(441,31,121,50,1,'https://pastebin.com/raw/SqqFRUzn',NULL,'2019-03-24 00:27:09',1,1,1,NULL),
	(451,31,171,22,0,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190304-185546.txt',NULL,'2019-03-24 00:31:16',1,1,1,NULL),
	(461,31,181,45,0,'https://crawl.kelbi.org/crawl/morgue/Amao/morgue-Amao-20190301-224640.txt',NULL,'2019-03-24 00:33:00',1,1,1,NULL),
	(471,31,11,15,0,'https://underhound.eu/crawl/morgue/lextramoth/morgue-lextramoth-20190304-155235.txt',NULL,'2019-03-24 00:34:35',1,1,1,NULL),
	(481,31,221,30,0,'https://crawl.xtahua.com/crawl/morgue/melvinkitnick/morgue-melvinkitnick-20190301-192241.txt',NULL,'2019-03-24 00:36:20',1,1,1,NULL),
	(491,51,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190204-001651.txt',NULL,'2019-03-24 00:39:30',1,1,1,NULL),
	(511,71,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190126-125223.txt',NULL,'2019-03-24 00:40:02',1,1,1,NULL),
	(521,51,21,50,2,'https://crawl.xtahua.com/crawl/morgue/pedritolo/morgue-pedritolo-20190203-162006.txt',NULL,'2019-03-24 00:41:36',1,1,1,NULL),
	(531,51,11,30,0,'',NULL,'2019-03-24 00:41:46',1,1,1,''),
	(541,71,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190125-195030.txt',NULL,'2019-03-24 00:41:54',1,1,1,NULL),
	(551,71,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190127-161227.txt',NULL,'2019-03-24 00:42:11',1,1,1,NULL),
	(561,31,91,40,0,'',NULL,'2019-03-24 00:42:19',1,1,1,''),
	(571,51,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190203-132631.txt',NULL,'2019-03-24 00:42:28',1,1,1,NULL),
	(581,51,61,50,2,'http://crawl.akrasiac.org/rawdata/blorx1/morgue-blorx1-20190205-031235.txt',NULL,'2019-03-24 00:43:19',1,1,1,NULL),
	(591,61,61,50,2,'http://crawl.akrasiac.org/rawdata/blorx1/morgue-blorx1-20190122-064344.txt',NULL,'2019-03-24 00:43:29',1,1,1,NULL),
	(601,71,61,50,2,'http://crawl.akrasiac.org/rawdata/blorx1/morgue-blorx1-20190128-013923.txt',NULL,'2019-03-24 00:43:37',1,1,1,NULL),
	(611,31,61,50,2,'',NULL,'2019-03-24 00:44:24',1,1,1,NULL),
	(621,51,61,0,0,'http://crawl.akrasiac.org/rawdata/blorx1/morgue-blorx1-20190202-062420.txt',NULL,'2019-03-24 14:54:02',0,1,1,NULL),
	(631,51,151,50,2,'http://crawl.berotato.org/crawl/morgue/demenzo/morgue-demenzo-20190202-095309.txt',NULL,'2019-03-24 15:07:12',1,1,1,NULL),
	(641,51,41,50,1,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190203-072124.txt',NULL,'2019-03-24 15:12:05',1,1,1,NULL),
	(651,51,111,50,1,'https://crawl.kelbi.org/crawl/morgue/Xqipyl/morgue-Xqipyl-20190208-133740.txt',NULL,'2019-03-24 15:14:51',1,1,1,''),
	(671,51,121,40,0,'https://pastebin.com/raw/cf7Y2Zuv',NULL,'2019-03-24 15:17:12',1,1,1,NULL),
	(681,51,231,22,0,'https://crawl.project357.org/morgue/EvilAliv3/morgue-EvilAliv3-20190207-150939.txt',NULL,'2019-03-24 15:19:21',1,1,1,NULL),
	(691,51,241,22,0,'https://pastebin.com/raw/sXyi2TYm',NULL,'2019-03-24 15:20:57',1,1,1,NULL),
	(701,51,81,30,0,'https://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190207-030315.txt',NULL,'2019-03-24 15:21:43',1,1,1,NULL),
	(721,51,171,15,0,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190207-013815.txt',NULL,'2019-03-24 15:23:23',1,1,1,NULL),
	(731,51,251,50,0,'https://crawl.kelbi.org/crawl/morgue/Malacante/morgue-Malacante-20190206-185133.txt',NULL,'2019-03-24 15:25:09',1,1,1,NULL),
	(741,51,261,20,0,'https://pastebin.com/raw/jFK5dB9f',NULL,'2019-03-24 15:27:23',1,1,1,NULL),
	(751,51,271,20,0,'',NULL,'2019-03-24 15:28:48',1,1,1,NULL),
	(761,51,281,15,0,'https://crawl.kelbi.org/crawl/morgue/floraline/morgue-floraline-20190202-231556.txt',NULL,'2019-03-24 15:29:51',1,1,1,NULL),
	(771,71,151,35,0,'http://crawl.berotato.org/crawl/morgue/demenzo/morgue-demenzo-20190128-032355.txt',NULL,'2019-03-24 15:42:35',1,1,1,NULL),
	(781,71,11,22,0,'https://underhound.eu/crawl/morgue/lextramoth/morgue-lextramoth-20190127-191705.txt',NULL,'2019-03-24 15:44:14',1,1,1,NULL),
	(791,71,161,25,0,'http://crawl.berotato.org/crawl/morgue/Dazliare/morgue-Dazliare-20190130-222431.txt',NULL,'2019-03-24 15:53:01',1,1,1,NULL),
	(801,71,231,22,0,'https://crawl.project357.org/morgue/EvilAliv3/morgue-EvilAliv3-20190131-165653.txt',NULL,'2019-03-24 15:54:34',1,1,1,NULL),
	(811,71,41,30,0,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190128-011157.txt',NULL,'2019-03-24 15:55:12',1,1,1,NULL),
	(821,71,241,15,0,'https://pastebin.com/raw/3np7RBZ7',NULL,'2019-03-24 15:55:56',1,1,1,NULL),
	(841,71,121,22,0,'https://pastebin.com/raw/n0VNhb1S',NULL,'2019-03-24 16:02:55',1,1,1,NULL),
	(851,71,81,20,0,'https://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190130-213602.txt',NULL,'2019-03-24 16:04:00',1,1,1,NULL),
	(861,71,111,30,0,'https://crawl.kelbi.org/crawl/morgue/Xqipyl/morgue-Xqipyl-20190129-200408.txt',NULL,'2019-03-24 16:04:53',1,1,1,NULL),
	(871,71,171,15,0,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190131-203518.txt',NULL,'2019-03-24 16:05:38',1,1,1,NULL),
	(881,61,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190119-192454.txt',NULL,'2019-03-24 16:33:59',1,1,1,NULL),
	(891,61,71,50,2,'http://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190120-082116.txt',NULL,'2019-03-24 16:34:28',1,1,1,NULL),
	(901,61,91,50,2,'http://crawl.berotato.org/crawl/morgue/agentgt/morgue-agentgt-20190124-152040.txt',NULL,'2019-03-24 16:35:09',1,1,1,NULL),
	(911,61,151,50,2,'http://crawl.berotato.org/crawl/morgue/demenzo/morgue-demenzo-20190121-004358.txt',NULL,'2019-03-24 16:35:54',1,1,1,NULL),
	(921,61,161,22,0,'http://crawl.berotato.org/crawl/morgue/Dazliare/morgue-Dazliare-20190119-062050.txt',NULL,'2019-03-24 16:37:09',1,1,1,NULL),
	(941,61,41,50,2,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190121-042235.txt',NULL,'2019-03-24 16:38:32',1,1,1,NULL),
	(951,61,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190120-190125.txt',NULL,'2019-03-24 16:40:31',1,1,1,NULL),
	(961,61,171,22,0,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190122-004321.txt',NULL,'2019-03-24 16:41:00',1,1,1,NULL),
	(971,61,111,50,2,'https://crawl.kelbi.org/crawl/morgue/Xqipyl/morgue-Xqipyl-20190123-100510.txt',NULL,'2019-03-24 16:42:47',1,1,1,NULL),
	(981,61,121,30,0,'https://pastebin.com/Yu3L6X3q',NULL,'2019-03-24 16:43:22',1,1,1,''),
	(991,61,241,50,1,'https://pastebin.com/raw/EqtSTqrr',NULL,'2019-03-24 16:44:18',1,1,1,NULL),
	(1001,61,11,7,0,'https://underhound.eu/crawl/morgue/lextramoth/morgue-lextramoth-20190125-142032.txt',NULL,'2019-03-24 16:45:20',1,1,1,NULL),
	(1011,61,231,45,0,'https://crawl.project357.org/morgue/EvilAliv3/EvilAliv3.txt',NULL,'2019-03-24 16:45:57',1,1,1,''),
	(1031,11,11,15,0,'https://underhound.eu/crawl/morgue/alkemann/morgue-alkemann-20190324-205651.txt',NULL,'2019-03-24 21:02:02',1,1,1,'Having no luck.. Shafted too much! I think these 15 points will have to do for this week!'),
	(1041,51,161,50,0,'',NULL,'2019-03-25 13:33:19',1,1,1,''),
	(1051,61,81,37,0,'',NULL,'2019-03-25 13:36:06',1,1,0,''),
	(1071,11,291,30,1,'http://crawl.akrasiac.org/rawdata/Djent/morgue-Djent-20190324-202844.txt',NULL,'2019-03-25 14:05:59',1,1,1,'20+10 1*'),
	(1091,11,301,0,0,'https://underhound.eu/crawl/morgue/Slacking101/morgue-Slacking101-20190321-132128.txt',NULL,'2019-03-26 00:21:41',1,1,1,NULL),
	(1101,1,171,15,0,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190321-145841.txt',NULL,'2019-03-26 00:32:55',1,1,1,NULL),
	(1111,1,161,22,0,'http://crawl.berotato.org/crawl/morgue/DazliareCantWin/morgue-DazliareCantWin-20190319-040157.txt',NULL,'2019-03-26 00:36:04',1,1,1,NULL),
	(1121,1,21,50,2,'http://crawl.xtahua.com/crawl/morgue/pedritolo/morgue-pedritolo-20190318-003627.txt',NULL,'2019-03-26 00:57:19',1,1,1,NULL),
	(1131,1,101,30,0,'https://pastebin.com/raw/jvzwu0Kd',NULL,'2019-03-26 00:57:56',1,1,0,''),
	(1141,11,121,30,0,'https://pastebin.com/raw/rKVPrL7L',NULL,'2019-03-26 21:21:01',1,1,1,'from reddit S4W2 \" I got four milestones and followed all conducts. \"'),
	(1151,11,91,50,2,'http://crawl.berotato.org/crawl/morgue/agentgt/morgue-agentgt-20190327-160323.txt',NULL,'2019-03-27 20:14:42',1,1,1,'\"all bonuses and conducts\"'),
	(1161,11,61,50,2,'https://crawl.kelbi.org/crawl/morgue/blorx1/morgue-blorx1-20190326-223934.txt',NULL,'2019-03-27 20:19:28',1,1,1,''),
	(1171,131,21,50,2,'',NULL,'2019-03-28 22:50:19',1,1,1,''),
	(1181,121,21,50,2,'',NULL,'2019-03-28 22:50:37',1,1,1,''),
	(1191,111,21,50,2,'',NULL,'2019-03-28 22:50:48',1,1,1,''),
	(1201,101,21,50,2,'',NULL,'2019-03-28 22:51:01',1,1,1,''),
	(1211,91,21,50,2,'',NULL,'2019-03-28 22:51:11',1,1,1,''),
	(1221,81,21,50,2,'',NULL,'2019-03-28 22:51:20',1,1,1,''),
	(1231,131,31,50,2,'',NULL,'2019-03-28 22:51:48',1,1,1,''),
	(1241,121,31,50,2,'',NULL,'2019-03-28 22:52:01',1,1,1,''),
	(1251,111,31,50,2,'',NULL,'2019-03-28 22:52:11',1,1,1,''),
	(1261,101,31,50,2,'',NULL,'2019-03-28 22:52:22',1,1,1,''),
	(1271,91,31,50,2,'',NULL,'2019-03-28 22:52:32',1,1,1,''),
	(1281,81,31,50,2,'',NULL,'2019-03-28 22:52:50',1,1,1,''),
	(1291,131,71,50,2,'',NULL,'2019-03-28 22:53:15',1,1,1,''),
	(1301,121,71,50,2,'',NULL,'2019-03-28 22:54:27',1,1,1,''),
	(1311,111,71,50,2,'',NULL,'2019-03-28 22:54:35',1,1,1,''),
	(1321,101,71,50,2,'',NULL,'2019-03-28 22:54:44',1,1,1,''),
	(1331,91,71,50,2,'',NULL,'2019-03-28 22:54:52',1,1,1,''),
	(1341,81,71,50,2,'',NULL,'2019-03-28 22:55:01',1,1,1,''),
	(1351,131,321,50,2,'',NULL,'2019-03-28 22:56:56',1,1,1,''),
	(1361,121,321,50,2,'',NULL,'2019-03-28 22:57:10',1,1,1,''),
	(1371,111,321,50,2,'',NULL,'2019-03-28 22:57:17',1,1,1,''),
	(1381,101,321,50,2,'',NULL,'2019-03-28 22:57:24',1,1,1,''),
	(1391,91,321,50,2,'',NULL,'2019-03-28 22:57:34',1,1,1,''),
	(1411,131,331,50,2,'',NULL,'2019-03-28 22:59:46',1,1,1,''),
	(1421,121,331,50,2,'',NULL,'2019-03-28 23:00:07',1,1,1,''),
	(1431,111,331,50,2,'',NULL,'2019-03-28 23:00:15',1,1,1,''),
	(1441,101,331,35,0,'',NULL,'2019-03-28 23:00:23',1,1,1,''),
	(1451,81,331,50,2,'',NULL,'2019-03-28 23:00:40',1,1,1,''),
	(1461,131,81,35,0,'',NULL,'2019-03-28 23:02:26',1,1,1,''),
	(1471,121,81,35,0,'',NULL,'2019-03-28 23:02:34',1,1,1,''),
	(1481,111,81,35,0,'',NULL,'2019-03-28 23:02:50',1,1,1,''),
	(1491,101,81,45,0,'',NULL,'2019-03-28 23:03:00',1,1,1,''),
	(1501,91,81,35,0,'',NULL,'2019-03-28 23:03:26',1,1,1,''),
	(1511,81,81,50,1,'',NULL,'2019-03-28 23:03:44',1,1,1,''),
	(1521,131,41,20,0,'',NULL,'2019-03-28 23:05:25',1,1,1,''),
	(1531,121,41,50,0,'',NULL,'2019-03-28 23:05:47',1,1,1,''),
	(1541,111,41,50,2,'',NULL,'2019-03-28 23:06:06',1,1,1,''),
	(1551,101,41,50,0,'',NULL,'2019-03-28 23:06:26',1,1,1,''),
	(1561,81,41,50,1,'',NULL,'2019-03-28 23:06:39',1,1,1,''),
	(1571,131,291,20,0,'',NULL,'2019-03-28 23:07:26',1,1,1,''),
	(1581,111,291,35,0,'',NULL,'2019-03-28 23:07:46',1,1,1,''),
	(1591,101,291,20,0,'',NULL,'2019-03-28 23:08:05',1,1,1,''),
	(1601,91,291,20,0,'',NULL,'2019-03-28 23:08:15',1,1,1,''),
	(1611,81,291,35,0,'',NULL,'2019-03-28 23:08:26',1,1,1,''),
	(1621,121,121,30,0,'',NULL,'2019-03-28 23:09:17',1,1,1,''),
	(1631,111,121,20,0,'',NULL,'2019-03-28 23:09:32',1,1,1,''),
	(1641,101,121,20,0,'',NULL,'2019-03-28 23:09:42',1,1,1,''),
	(1651,91,121,20,0,'',NULL,'2019-03-28 23:09:58',1,1,1,''),
	(1661,81,121,35,0,'',NULL,'2019-03-28 23:10:10',1,1,1,''),
	(1671,131,271,50,0,'',NULL,'2019-03-28 23:10:50',1,1,1,''),
	(1681,121,271,35,0,'',NULL,'2019-03-28 23:11:10',1,1,1,''),
	(1691,101,181,45,0,'',NULL,'2019-03-28 23:11:48',1,1,1,''),
	(1701,121,341,35,0,'',NULL,'2019-03-28 23:13:01',1,1,1,''),
	(1711,101,91,30,0,'',NULL,'2019-03-28 23:13:35',1,1,1,''),
	(1721,131,351,20,0,'',NULL,'2019-03-28 23:14:50',1,1,1,''),
	(1731,81,151,50,1,'',NULL,'2019-03-28 23:15:28',1,1,1,''),
	(1741,81,231,50,0,'',NULL,'2019-03-28 23:16:22',1,1,1,''),
	(1751,11,81,30,0,'http://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190329-023321.txt',NULL,'2019-03-29 02:50:20',1,1,1,''),
	(1761,11,181,30,0,'https://crawl.kelbi.org/crawl/morgue/Amao/morgue-Amao-20190323-203813.txt',NULL,'2019-03-29 02:54:53',1,1,1,''),
	(1771,11,171,45,1,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190329-034047.txt',NULL,'2019-03-29 04:04:11',1,1,1,''),
	(1781,11,111,37,0,'https://crawl.kelbi.org/crawl/morgue/Xqipyl/morgue-Xqipyl-20190329-064725.txt',NULL,'2019-03-29 16:38:57',1,1,1,''),
	(1801,41,31,50,2,'https://underhound.eu/crawl/morgue/Ge0ff/morgue-Ge0ff-20190330-215844.txt',NULL,'2019-03-31 11:46:30',1,1,1,'\"All stuff done\"'),
	(1811,41,21,50,2,'https://underhound.eu/crawl/morgue/pedritolo/morgue-pedritolo-20190331-181415.txt',NULL,'2019-03-31 18:31:23',1,1,1,'\" all stuff done \"'),
	(1821,11,161,22,0,'http://crawl.berotato.org/crawl/morgue/Dazliare/morgue-Dazliare-20190326-215906.txt',NULL,'2019-03-31 21:35:07',1,1,1,''),
	(1841,11,71,50,2,'https://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190325-162947.txt',NULL,'2019-04-02 15:47:12',1,1,1,''),
	(1851,41,71,50,2,'http://crawl.kelbi.org/crawl/morgue/EthnicCake/morgue-EthnicCake-20190331-203141.txt',NULL,'2019-04-02 16:21:42',1,1,1,'Both Zot and Abyss ended up being harder than Tomb, which was mostly just hanging back and letting scarabs do all the work.'),
	(1861,11,311,50,2,'https://crawl.xtahua.com/crawl/morgue/Monsterracer/morgue-Monsterracer-20190324-194524.txt',NULL,'2019-04-02 21:35:31',1,1,1,''),
	(1881,41,41,50,1,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190403-031955.txt',NULL,'2019-04-03 13:16:22',0,0,1,'\" No golden rune this time, so 50* for me. \"'),
	(1901,41,81,40,0,'http://crawl.kelbi.org/crawl/morgue/RoGGa/morgue-RoGGa-20190402-235449.txt',NULL,'2019-04-03 16:53:31',1,1,1,''),
	(1911,41,11,20,0,'https://underhound.eu/crawl/morgue/lextramoth/morgue-lextramoth-20190404-155313.txt',NULL,'2019-04-04 15:55:17',1,1,1,'Mummy is hard mode'),
	(1921,41,41,50,2,'https://crawl.kelbi.org/crawl/morgue/TheMeInTeam/morgue-TheMeInTeam-20190404-180404.txt',NULL,'2019-04-04 23:00:27',1,1,1,''),
	(1931,41,121,22,0,'https://pastebin.com/6F89FtWp',NULL,'2019-04-04 23:01:33',1,1,0,''),
	(1941,41,171,40,1,'http://crawl.akrasiac.org/rawdata/Eldin/morgue-Eldin-20190405-004205.txt',NULL,'2019-04-05 01:42:11',1,1,1,''),
	(1951,291,11,30,0,'https://underhound.eu/crawl/morgue/lextramoth/morgue-lextramoth-20190408-224925.txt',NULL,'2019-04-08 22:51:20',1,0,1,'');

/*!40000 ALTER TABLE `submissions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
