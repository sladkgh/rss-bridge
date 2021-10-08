<?php
class GithubTrendingBridge extends BridgeAbstract {

	const MAINTAINER = 'liamka';
	const NAME = 'Github Trending';
	const URI = 'https://github.com/trending';
	const URI_ITEM = 'https://github.com';
	const CACHE_TIMEOUT = 43200; // 12hr
	const DESCRIPTION = 'See what the GitHub community is most excited repos.';
	const PARAMETERS = array(
		'By language' => array(
			'language' => array(
				'name' => 'Select language',
				'type' => 'list',
				'values' => array(
					'All languages' => '',
					'C++' => 'c++',
					'HTML' => 'html',
					'Java' => 'java',
					'JavaScript' => 'javascript',
					'PHP' => 'php',
					'Python' => 'python',
					'Ruby' => 'ruby',
					'Unknown languages' => 'unknown languages',
					'1C Enterprise' => '1c enterprise',
					'4D' => '4d',
					'ABAP' => 'abap',
					'ABNF' => 'abnf',
					'ActionScript' => 'actionscript',
					'Ada' => 'ada',
					'Adobe Font Metrics' => 'adobe font metrics',
					'Agda' => 'agda',
					'AGS Script' => 'ags script',
					'Alloy' => 'alloy',
					'Alpine Abuild' => 'alpine abuild',
					'Altium Designer' => 'altium designer',
					'AMPL' => 'ampl',
					'AngelScript' => 'angelscript',
					'Ant Build System' => 'ant build system',
					'ANTLR' => 'antlr',
					'ApacheConf' => 'apacheconf',
					'Apex' => 'apex',
					'API Blueprint' => 'api blueprint',
					'APL' => 'apl',
					'Apollo Guidance Computer' => 'apollo guidance computer',
					'AppleScript' => 'applescript',
					'Arc' => 'arc',
					'AsciiDoc' => 'asciidoc',
					'ASN.1' => 'asn.1',
					'ASP' => 'asp',
					'AspectJ' => 'aspectj',
					'Assembly' => 'assembly',
					'Asymptote' => 'asymptote',
					'ATS' => 'ats',
					'Augeas' => 'augeas',
					'AutoHotkey' => 'autohotkey',
					'AutoIt' => 'autoit',
					'Awk' => 'awk',
					'Ballerina' => 'ballerina',
					'Batchfile' => 'batchfile',
					'Befunge' => 'befunge',
					'BibTeX' => 'bibtex',
					'Bison' => 'bison',
					'BitBake' => 'bitbake',
					'Blade' => 'blade',
					'BlitzBasic' => 'blitzbasic',
					'BlitzMax' => 'blitzmax',
					'Bluespec' => 'bluespec',
					'Boo' => 'boo',
					'Brainfuck' => 'brainfuck',
					'Brightscript' => 'brightscript',
					'Zeek' => 'zeek',
					'C' => 'c',
					'C#' => 'c#',
					'C++' => 'c++',
					'C-ObjDump' => 'c-objdump',
					'C2hs Haskell' => 'c2hs haskell',
					'Cabal Config' => 'cabal config',
					'CartoCSS' => 'cartocss',
					'Ceylon' => 'ceylon',
					'Chapel' => 'chapel',
					'Charity' => 'charity',
					'ChucK' => 'chuck',
					'Cirru' => 'cirru',
					'Clarion' => 'clarion',
					'Clean' => 'clean',
					'Click' => 'click',
					'CLIPS' => 'clips',
					'Clojure' => 'clojure',
					'Closure Templates' => 'closure templates',
					'Cloud Firestore Security Rules' => 'cloud firestore security rules',
					'CMake' => 'cmake',
					'COBOL' => 'cobol',
					'CodeQL' => 'codeql',
					'CoffeeScript' => 'coffeescript',
					'ColdFusion' => 'coldfusion',
					'ColdFusion CFC' => 'coldfusion cfc',
					'COLLADA' => 'collada',
					'Common Lisp' => 'common lisp',
					'Common Workflow Language' => 'common workflow language',
					'Component Pascal' => 'component pascal',
					'CoNLL-U' => 'conll-u',
					'Cool' => 'cool',
					'Coq' => 'coq',
					'Cpp-ObjDump' => 'cpp-objdump',
					'Creole' => 'creole',
					'Crystal' => 'crystal',
					'CSON' => 'cson',
					'Csound' => 'csound',
					'Csound Document' => 'csound document',
					'Csound Score' => 'csound score',
					'CSS' => 'css',
					'CSV' => 'csv',
					'Cuda' => 'cuda',
					'cURL Config' => 'curl config',
					'CWeb' => 'cweb',
					'Cycript' => 'cycript',
					'Cython' => 'cython',
					'D' => 'd',
					'D-ObjDump' => 'd-objdump',
					'Darcs Patch' => 'darcs patch',
					'Dart' => 'dart',
					'DataWeave' => 'dataweave',
					'desktop' => 'desktop',
					'Dhall' => 'dhall',
					'Diff' => 'diff',
					'DIGITAL Command Language' => 'digital command language',
					'dircolors' => 'dircolors',
					'DirectX 3D File' => 'directx 3d file',
					'DM' => 'dm',
					'DNS Zone' => 'dns zone',
					'Dockerfile' => 'dockerfile',
					'Dogescript' => 'dogescript',
					'DTrace' => 'dtrace',
					'Dylan' => 'dylan',
					'E' => 'e',
					'Eagle' => 'eagle',
					'Easybuild' => 'easybuild',
					'EBNF' => 'ebnf',
					'eC' => 'ec',
					'Ecere Projects' => 'ecere projects',
					'ECL' => 'ecl',
					'ECLiPSe' => 'eclipse',
					'EditorConfig' => 'editorconfig',
					'Edje Data Collection' => 'edje data collection',
					'edn' => 'edn',
					'Eiffel' => 'eiffel',
					'EJS' => 'ejs',
					'Elixir' => 'elixir',
					'Elm' => 'elm',
					'Emacs Lisp' => 'emacs lisp',
					'EmberScript' => 'emberscript',
					'EML' => 'eml',
					'EQ' => 'eq',
					'Erlang' => 'erlang',
					'F#' => 'f#',
					'F*' => 'f*',
					'Factor' => 'factor',
					'Fancy' => 'fancy',
					'Fantom' => 'fantom',
					'Faust' => 'faust',
					'FIGlet Font' => 'figlet font',
					'Filebench WML' => 'filebench wml',
					'Filterscript' => 'filterscript',
					'fish' => 'fish',
					'FLUX' => 'flux',
					'Formatted' => 'formatted',
					'Forth' => 'forth',
					'Fortran' => 'fortran',
					'FreeMarker' => 'freemarker',
					'Frege' => 'frege',
					'G-code' => 'g-code',
					'Game Maker Language' => 'game maker language',
					'GAML' => 'gaml',
					'GAMS' => 'gams',
					'GAP' => 'gap',
					'GCC Machine Description' => 'gcc machine description',
					'GDB' => 'gdb',
					'GDScript' => 'gdscript',
					'Genie' => 'genie',
					'Genshi' => 'genshi',
					'Gentoo Ebuild' => 'gentoo ebuild',
					'Gentoo Eclass' => 'gentoo eclass',
					'Gerber Image' => 'gerber image',
					'Gettext Catalog' => 'gettext catalog',
					'Gherkin' => 'gherkin',
					'Git Attributes' => 'git attributes',
					'Git Config' => 'git config',
					'GLSL' => 'glsl',
					'Glyph' => 'glyph',
					'Glyph Bitmap Distribution Format' => 'glyph bitmap distribution format',
					'GN' => 'gn',
					'Gnuplot' => 'gnuplot',
					'Go' => 'go',
					'Golo' => 'golo',
					'Gosu' => 'gosu',
					'Grace' => 'grace',
					'Gradle' => 'gradle',
					'Grammatical Framework' => 'grammatical framework',
					'Graph Modeling Language' => 'graph modeling language',
					'GraphQL' => 'graphql',
					'Graphviz (DOT)' => 'graphviz (dot)',
					'Groovy' => 'groovy',
					'Groovy Server Pages' => 'groovy server pages',
					'Hack' => 'hack',
					'Haml' => 'haml',
					'Handlebars' => 'handlebars',
					'HAProxy' => 'haproxy',
					'Harbour' => 'harbour',
					'Haskell' => 'haskell',
					'Haxe' => 'haxe',
					'HCL' => 'hcl',
					'HiveQL' => 'hiveql',
					'HLSL' => 'hlsl',
					'HolyC' => 'holyc',
					'HTML' => 'html',
					'HTML+Django' => 'html+django',
					'HTML+ECR' => 'html+ecr',
					'HTML+EEX' => 'html+eex',
					'HTML+ERB' => 'html+erb',
					'HTML+PHP' => 'html+php',
					'HTML+Razor' => 'html+razor',
					'HTTP' => 'http',
					'HXML' => 'hxml',
					'Hy' => 'hy',
					'HyPhy' => 'hyphy',
					'IDL' => 'idl',
					'Idris' => 'idris',
					'Ignore List' => 'ignore list',
					'IGOR Pro' => 'igor pro',
					'Inform 7' => 'inform 7',
					'INI' => 'ini',
					'Inno Setup' => 'inno setup',
					'Io' => 'io',
					'Ioke' => 'ioke',
					'IRC log' => 'irc log',
					'Isabelle' => 'isabelle',
					'Isabelle ROOT' => 'isabelle root',
					'J' => 'j',
					'Jasmin' => 'jasmin',
					'Java' => 'java',
					'Java Properties' => 'java properties',
					'Java Server Pages' => 'java server pages',
					'JavaScript' => 'javascript',
					'JavaScript+ERB' => 'javascript+erb',
					'JFlex' => 'jflex',
					'Jison' => 'jison',
					'Jison Lex' => 'jison lex',
					'Jolie' => 'jolie',
					'JSON' => 'json',
					'JSON with Comments' => 'json with comments',
					'JSON5' => 'json5',
					'JSONiq' => 'jsoniq',
					'JSONLD' => 'jsonld',
					'Jsonnet' => 'jsonnet',
					'JSX' => 'jsx',
					'Julia' => 'julia',
					'Jupyter Notebook' => 'jupyter notebook',
					'KiCad Layout' => 'kicad layout',
					'KiCad Legacy Layout' => 'kicad legacy layout',
					'KiCad Schematic' => 'kicad schematic',
					'Kit' => 'kit',
					'Kotlin' => 'kotlin',
					'KRL' => 'krl',
					'LabVIEW' => 'labview',
					'Lasso' => 'lasso',
					'Latte' => 'latte',
					'Lean' => 'lean',
					'Less' => 'less',
					'Lex' => 'lex',
					'LFE' => 'lfe',
					'LilyPond' => 'lilypond',
					'Limbo' => 'limbo',
					'Linker Script' => 'linker script',
					'Linux Kernel Module' => 'linux kernel module',
					'Liquid' => 'liquid',
					'Literate Agda' => 'literate agda',
					'Literate CoffeeScript' => 'literate coffeescript',
					'Literate Haskell' => 'literate haskell',
					'LiveScript' => 'livescript',
					'LLVM' => 'llvm',
					'Logos' => 'logos',
					'Logtalk' => 'logtalk',
					'LOLCODE' => 'lolcode',
					'LookML' => 'lookml',
					'LoomScript' => 'loomscript',
					'LSL' => 'lsl',
					'LTspice Symbol' => 'ltspice symbol',
					'Lua' => 'lua',
					'M' => 'm',
					'M4' => 'm4',
					'M4Sugar' => 'm4sugar',
					'Makefile' => 'makefile',
					'Mako' => 'mako',
					'Markdown' => 'markdown',
					'Marko' => 'marko',
					'Mask' => 'mask',
					'Mathematica' => 'mathematica',
					'MATLAB' => 'matlab',
					'Maven POM' => 'maven pom',
					'Max' => 'max',
					'MAXScript' => 'maxscript',
					'mcfunction' => 'mcfunction',
					'MediaWiki' => 'mediawiki',
					'Mercury' => 'mercury',
					'Meson' => 'meson',
					'Metal' => 'metal',
					'Microsoft Developer Studio Project' => 'microsoft developer studio project',
					'MiniD' => 'minid',
					'Mirah' => 'mirah',
					'mIRC Script' => 'mirc script',
					'MLIR' => 'mlir',
					'Modelica' => 'modelica',
					'Modula-2' => 'modula-2',
					'Modula-3' => 'modula-3',
					'Module Management System' => 'module management system',
					'Monkey' => 'monkey',
					'Moocode' => 'moocode',
					'MoonScript' => 'moonscript',
					'Motorola 68K Assembly' => 'motorola 68k assembly',
					'MQL4' => 'mql4',
					'MQL5' => 'mql5',
					'MTML' => 'mtml',
					'MUF' => 'muf',
					'mupad' => 'mupad',
					'Muse' => 'muse',
					'Myghty' => 'myghty',
					'nanorc' => 'nanorc',
					'NASL' => 'nasl',
					'NCL' => 'ncl',
					'Nearley' => 'nearley',
					'Nemerle' => 'nemerle',
					'nesC' => 'nesc',
					'NetLinx' => 'netlinx',
					'NetLinx+ERB' => 'netlinx+erb',
					'NetLogo' => 'netlogo',
					'NewLisp' => 'newlisp',
					'Nextflow' => 'nextflow',
					'Nginx' => 'nginx',
					'Nim' => 'nim',
					'Ninja' => 'ninja',
					'Nit' => 'nit',
					'Nix' => 'nix',
					'NL' => 'nl',
					'NPM Config' => 'npm config',
					'NSIS' => 'nsis',
					'Nu' => 'nu',
					'NumPy' => 'numpy',
					'ObjDump' => 'objdump',
					'Object Data Instance Notation' => 'object data instance notation',
					'Objective-C' => 'objective-c',
					'Objective-C++' => 'objective-c++',
					'Objective-J' => 'objective-j',
					'ObjectScript' => 'objectscript',
					'OCaml' => 'ocaml',
					'Odin' => 'odin',
					'Omgrofl' => 'omgrofl',
					'ooc' => 'ooc',
					'Opa' => 'opa',
					'Opal' => 'opal',
					'Open Policy Agent' => 'open policy agent',
					'OpenCL' => 'opencl',
					'OpenEdge ABL' => 'openedge abl',
					'OpenQASM' => 'openqasm',
					'OpenRC runscript' => 'openrc runscript',
					'OpenSCAD' => 'openscad',
					'OpenStep Property List' => 'openstep property list',
					'OpenType Feature File' => 'opentype feature file',
					'Org' => 'org',
					'Ox' => 'ox',
					'Oxygene' => 'oxygene',
					'Oz' => 'oz',
					'P4' => 'p4',
					'Pan' => 'pan',
					'Papyrus' => 'papyrus',
					'Parrot' => 'parrot',
					'Parrot Assembly' => 'parrot assembly',
					'Parrot Internal Representation' => 'parrot internal representation',
					'Pascal' => 'pascal',
					'Pawn' => 'pawn',
					'Pep8' => 'pep8',
					'Perl' => 'perl',
					'PHP' => 'php',
					'Pic' => 'pic',
					'Pickle' => 'pickle',
					'PicoLisp' => 'picolisp',
					'PigLatin' => 'piglatin',
					'Pike' => 'pike',
					'PLpgSQL' => 'plpgsql',
					'PLSQL' => 'plsql',
					'Pod' => 'pod',
					'Pod 6' => 'pod 6',
					'PogoScript' => 'pogoscript',
					'Pony' => 'pony',
					'PostCSS' => 'postcss',
					'PostScript' => 'postscript',
					'POV-Ray SDL' => 'pov-ray sdl',
					'PowerBuilder' => 'powerbuilder',
					'PowerShell' => 'powershell',
					'Prisma' => 'prisma',
					'Processing' => 'processing',
					'Proguard' => 'proguard',
					'Prolog' => 'prolog',
					'Propeller Spin' => 'propeller spin',
					'Protocol Buffer' => 'protocol buffer',
					'Public Key' => 'public key',
					'Pug' => 'pug',
					'Puppet' => 'puppet',
					'Pure Data' => 'pure data',
					'PureBasic' => 'purebasic',
					'PureScript' => 'purescript',
					'Python' => 'python',
					'Python console' => 'python console',
					'Python traceback' => 'python traceback',
					'q' => 'q',
					'QMake' => 'qmake',
					'QML' => 'qml',
					'Quake' => 'quake',
					'R' => 'r',
					'Racket' => 'racket',
					'Ragel' => 'ragel',
					'Raku' => 'raku',
					'RAML' => 'raml',
					'Rascal' => 'rascal',
					'Raw token data' => 'raw token data',
					'RDoc' => 'rdoc',
					'Readline Config' => 'readline config',
					'REALbasic' => 'realbasic',
					'Reason' => 'reason',
					'Rebol' => 'rebol',
					'Red' => 'red',
					'Redcode' => 'redcode',
					'Regular Expression' => 'regular expression',
					// 'Ren'Py' => 'ren'py',
					'RenderScript' => 'renderscript',
					'reStructuredText' => 'restructuredtext',
					'REXX' => 'rexx',
					'RHTML' => 'rhtml',
					'Rich Text Format' => 'rich text format',
					'Ring' => 'ring',
					'Riot' => 'riot',
					'RMarkdown' => 'rmarkdown',
					'RobotFramework' => 'robotframework',
					'Roff' => 'roff',
					'Roff Manpage' => 'roff manpage',
					'Rouge' => 'rouge',
					'RPC' => 'rpc',
					'RPM Spec' => 'rpm spec',
					'Ruby' => 'ruby',
					'RUNOFF' => 'runoff',
					'Rust' => 'rust',
					'Sage' => 'sage',
					'SaltStack' => 'saltstack',
					'SAS' => 'sas',
					'Sass' => 'sass',
					'Scala' => 'scala',
					'Scaml' => 'scaml',
					'Scheme' => 'scheme',
					'Scilab' => 'scilab',
					'SCSS' => 'scss',
					'sed' => 'sed',
					'Self' => 'self',
					'ShaderLab' => 'shaderlab',
					'Shell' => 'shell',
					'ShellSession' => 'shellsession',
					'Shen' => 'shen',
					'Slash' => 'slash',
					'Slice' => 'slice',
					'Slim' => 'slim',
					'Smali' => 'smali',
					'Smalltalk' => 'smalltalk',
					'Smarty' => 'smarty',
					'SmPL' => 'smpl',
					'SMT' => 'smt',
					'Solidity' => 'solidity',
					'SourcePawn' => 'sourcepawn',
					'SPARQL' => 'sparql',
					'Spline Font Database' => 'spline font database',
					'SQF' => 'sqf',
					'SQL' => 'sql',
					'SQLPL' => 'sqlpl',
					'Squirrel' => 'squirrel',
					'SRecode Template' => 'srecode template',
					'SSH Config' => 'ssh config',
					'Stan' => 'stan',
					'Standard ML' => 'standard ml',
					'Starlark' => 'starlark',
					'Stata' => 'stata',
					'STON' => 'ston',
					'Stylus' => 'stylus',
					'SubRip Text' => 'subrip text',
					'SugarSS' => 'sugarss',
					'SuperCollider' => 'supercollider',
					'Svelte' => 'svelte',
					'SVG' => 'svg',
					'Swift' => 'swift',
					'SWIG' => 'swig',
					'SystemVerilog' => 'systemverilog',
					'Tcl' => 'tcl',
					'Tcsh' => 'tcsh',
					'Tea' => 'tea',
					'Terra' => 'terra',
					'TeX' => 'tex',
					'Texinfo' => 'texinfo',
					'Text' => 'text',
					'Textile' => 'textile',
					'Thrift' => 'thrift',
					'TI Program' => 'ti program',
					'TLA' => 'tla',
					'TOML' => 'toml',
					'TSQL' => 'tsql',
					'TSX' => 'tsx',
					'Turing' => 'turing',
					'Turtle' => 'turtle',
					'Twig' => 'twig',
					'TXL' => 'txl',
					'Type Language' => 'type language',
					'TypeScript' => 'typescript',
					'Unified Parallel C' => 'unified parallel c',
					'Unity3D Asset' => 'unity3d asset',
					'Unix Assembly' => 'unix assembly',
					'Uno' => 'uno',
					'UnrealScript' => 'unrealscript',
					'UrWeb' => 'urweb',
					'V' => 'v',
					'Vala' => 'vala',
					'VBA' => 'vba',
					'VBScript' => 'vbscript',
					'VCL' => 'vcl',
					'Verilog' => 'verilog',
					'VHDL' => 'vhdl',
					'Vim script' => 'vim script',
					'Vim Snippet' => 'vim snippet',
					'Visual Basic .NET' => 'visual basic .net',
					'Visual Basic .NET' => 'visual basic .net',
					'Volt' => 'volt',
					'Vue' => 'vue',
					'Wavefront Material' => 'wavefront material',
					'Wavefront Object' => 'wavefront object',
					'wdl' => 'wdl',
					'Web Ontology Language' => 'web ontology language',
					'WebAssembly' => 'webassembly',
					'WebIDL' => 'webidl',
					'WebVTT' => 'webvtt',
					'Wget Config' => 'wget config',
					'Windows Registry Entries' => 'windows registry entries',
					'wisp' => 'wisp',
					'Wollok' => 'wollok',
					'World of Warcraft Addon Data' => 'world of warcraft addon data',
					'X BitMap' => 'x bitmap',
					'X Font Directory Index' => 'x font directory index',
					'X PixMap' => 'x pixmap',
					'X10' => 'x10',
					'xBase' => 'xbase',
					'XC' => 'xc',
					'XCompose' => 'xcompose',
					'XML' => 'xml',
					'XML Property List' => 'xml property list',
					'Xojo' => 'xojo',
					'XPages' => 'xpages',
					'XProc' => 'xproc',
					'XQuery' => 'xquery',
					'XS' => 'xs',
					'XSLT' => 'xslt',
					'Xtend' => 'xtend',
					'Yacc' => 'yacc',
					'YAML' => 'yaml',
					'YANG' => 'yang',
					'YARA' => 'yara',
					'YASnippet' => 'yasnippet',
					'ZAP' => 'zap',
					'Zeek' => 'zeek',
					'ZenScript' => 'zenscript',
					'Zephir' => 'zephir',
					'Zig' => 'zig',
					'ZIL' => 'zil',
					'Zimpl' => 'zimpl',
				),
				'defaultValue' => 'All languages'
			)
		),

		'global' => array(
			'date_range' => array(
				'name' => 'Date range',
				'type' => 'list',
				'values' => array(
					'Today' => 'today',
					'Weekly' => 'weekly',
					'Monthly' => 'monthly',
				),
				'defaultValue' => 'today'
			)
		)

	);

	public function collectData(){
		$params = array('since' => urlencode($this->getInput('date_range')));
		$url = self::URI . '/' . $this->getInput('language') . '?' . http_build_query($params);

		$html = getSimpleHTMLDOM($url)
			or returnServerError('Error while downloading the website content');

		$this->items = array();
		foreach($html->find('.Box-row') as $element) {
			$item = array();

			// URI
			$item['uri'] = self::URI_ITEM . $element->find('h1 a', 0)->href;

			// Title
			$item['title'] = str_replace('  ', '', trim(strip_tags($element->find('h1 a', 0)->plaintext)));

			// Description
			$item['content'] = trim(strip_tags($element->find('p.text-gray', 0)->innertext));

			// Time
			$item['timestamp'] = time();

			// TODO: Proxy?
			$this->items[] = $item;
		}
	}

	public function getName(){
		if($this->getInput('language') == '') {
			return self::NAME . ': all';
		} elseif (!is_null($this->getInput('language'))) {
			return self::NAME . ': ' . $this->getInput('language');
		}

		return parent::getName();
	}
}
