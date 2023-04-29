# Control my bedroom

Superset de ferramentas para o controle dos meus equipamentos IOT do meu Quarto.

# Instalação

```bash
composer install
```

------

## Documentação

### Lampâda de LED

#### Liga ou desliga a lampâda

```bash
php application light {on|off}
```

##### Liga ou desliga a lampâda com a cor especificada

```bash 
php application light {on|off} --color=red 
```

#### Liga ou desliga a lampâda com a cor e brilho especificado

```bash 
php application light {on|off} --color=red --brightness=50 
```

#### Liga ou desliga a lampâda com a cor, brilho e temperatura especificado

```bash
php application light {on|off} --color=red --brightness=50 --temperature=50 
```